<?php

header("Content-Type: text/html;charset=utf-8");

include("Conexion.php") ;
$id=$_REQUEST['id_proyecto'];
$query="SELECT * from proyecto where id_proyecto='$id'";
$resultado = mysqli_query($conexion, $query);

require('../pdf/fdpf/fpdf.php');

class PDF extends FPDF
{
    

    var $widths;
    var $aligns;
    function SetWidths($w)
{
    //Set the array of column widths
    
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
      
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

   /* function Header()
    {
       // global $title;
    
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Calculate width of title and position
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        // Colors of frame, background and text
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(230,230,0);
        $this->SetTextColor(220,50,50);
        // Thickness of frame (1 mm)
        $this->SetLineWidth(1);
        // Title
        $this->Cell($w,9,$title,1,1,'C',true);
        // Line break
        $this->Ln(10);
    }*/
    protected $_toc=array();
    protected $_numbering=false;
    protected $_numberingFooter=false;
    protected $_numPageNum=1;

    function AddPage($orientation='', $format='', $rotation=0) {
        parent::AddPage($orientation,$format,$rotation);
        if($this->_numbering)
            $this->_numPageNum++;
    }

    function startPageNums() {
        $this->_numbering=true;
        $this->_numberingFooter=true;
    }

    function stopPageNums() {
        $this->_numbering=false;
    }

    function numPageNo() {
        return $this->_numPageNum;
    }

    function TOC_Entry($txt, $level=0) {
        $this->_toc[]=array('t'=>$txt,'l'=>$level,'p'=>$this->numPageNo());
    }

    function insertTOC( $location=1,
                        $labelSize=20,
                        $entrySize=10,
                        $tocfont='Times',
                        $label='INDICE'
                        ) {
        //make toc at end
        $this->stopPageNums();
        $this->AddPage();
        $tocstart=$this->page;

        $this->SetFont($tocfont,'B',$labelSize);
        $this->Cell(0,5,$label,0,1,'C');
        $this->Ln(10);

        foreach($this->_toc as $t) {

            //Offset
            $level=$t['l'];
            if($level>0)
                $this->Cell($level*8);
            $weight='';
            if($level==0)
                $weight='B';
            $str=$t['t'];
            $this->SetFont($tocfont,$weight,$entrySize);
            $strsize=$this->GetStringWidth($str);
            $this->Cell($strsize+2,$this->FontSize+2,$str);

            //Filling dots
            $this->SetFont($tocfont,'',$entrySize);
            $PageCellSize=$this->GetStringWidth($t['p'])+2;
            $w=$this->w-$this->lMargin-$this->rMargin-$PageCellSize-($level*8)-($strsize+2);
            $nb=$w/$this->GetStringWidth('.');
            $dots=str_repeat('.',$nb);
            $this->Cell($w,$this->FontSize+2,$dots,0,0,'R');

            //Page number
            $this->Cell($PageCellSize,$this->FontSize+2,$t['p'],0,1,'R');
        }

        //Grab it and move to selected location
        $n=$this->page;
        $n_toc = $n - $tocstart + 1;
        $last = array();

        //store toc pages
        for($i = $tocstart;$i <= $n;$i++)
            $last[]=$this->pages[$i];

        //move pages
        for($i=$tocstart-1;$i>=$location-1;$i--)
            $this->pages[$i+$n_toc]=$this->pages[$i];

        //Put toc pages at insert point
        for($i = 0;$i < $n_toc;$i++)
            $this->pages[$location + $i]=$last[$i];
    }

    function Footer() {
        if(!$this->_numberingFooter)
            return;
        //Go to 1.5 cm from bottom
        $this->SetY(-15);
        //Select Arial italic 8
        $this->SetFont('Arial','I',8);
        $this->Cell(0,7,$this->numPageNo(),0,0,'C'); 
        if(!$this->_numbering)
            $this->_numberingFooter=false;
    }
   
    function MultiCellBlt($w, $h, $blt, $txt, $border=0, $align='J', $fill=false)
    {
        //Get bullet width including margins
        $blt_width = $this->GetStringWidth($blt)+$this->cMargin*2;

        //Save x
        $bak_x = $this->x;

        //Output bullet
        $this->Cell($blt_width,$h,$blt,0,'',$fill);

        //Output text
        $this->MultiCell($w-$blt_width,$h,$txt,$border,$align,$fill);

        //Restore x
        $this->x = $bak_x;
    }

    function TituloApendice($title){
        $this->SetFont('Arial','B',15);
        // Calculate width of title and position
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        // Colors of frame, background and text
    
        $this->SetFillColor(255,255,255);
    
        // Thickness of frame (1 mm)
     
        // Title
        $this->Cell($w,9,$title,0,1,'C',true);
        // Line break
        $this->Ln(10);


    }
    function TituloTabla($title){
        $this->SetFont('Arial','',12);
        // Calculate width of title and position
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        // Colors of frame, background and text
    
        $this->SetFillColor(255,255,255);
    
        // Thickness of frame (1 mm)
     
        // Title
        $this->Cell($w,9,$title,0,1,'C',true);
        // Line break
        $this->Ln(2);


    }

    function subtitulo($label){
        $this->SetFont('Arial','',12);
        // Background color
        $this->SetFillColor(255,255,255);
        // Title
        $this->Cell(0,6,"$label",0,1,'L',true);
        // Line break
        $this->Ln(4);
    }
    
    function ChapterTitle($num, $label)
    {
        // Arial 12
        $this->SetFont('Arial','',12);
        // Background color
        $this->SetFillColor(255,255,255);
        // Title
        $this->Cell(0,6,"$num  $label",0,1,'L',true);
        // Line break
        $this->Ln(4);
    }

   
    function actividades(){
        $this->TOC_Entry('1.5 CRONOGRAMA DE ACTIVIDADES', 1);
        $this->ChapterTitle(1.5,'CRONOGRAMA DE ACTIVIDADES');

    }

    function metodologia(){
        $column_widthM = ($this->GetPageWidth()-20);
        $me = 'La metodología que se aplicaré en el presente proyecto para la ejecuciónde auditoría informática, no tiene un nombre definido ya que es una especie de estándar ';
        $me2 ='A continuación se describe la metodología, en una serie de pasos (tres etapas fundamentales) que sedebe ejecutar en el mismo orden que se presenta: ';
        $this->AddPage();
        $this->ChapterTitle(1.6,'METODOLOGIA TECNICAS Y HERRAMIENTAS');
        $this->TOC_Entry('1.6 METODOLOGIAS TECNICAS Y HERRAMIENTAS', 1);
        $this->ChapterTitle('1.6.1','METODOLOGIA');
        $this->TOC_Entry('1.6.1 METODOLOGIA', 2);
       
        $this->SetFont('Times','',12);
        $this->MultiCell(0,5,utf8_decode($me));
        $this->ln();
        $this->MultiCell(0,5,utf8_decode($me2));
        $this->ln();
       
        $this->ChapterTitle('Etapa 1: ',utf8_decode('Planeación de la auditoría '));
        $this->SetFont('Times','',12);
        
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E1.1: Identificar el origen de la auditoría '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E1.2: Realizar una Visita Preliminar al área que se está evaluando'));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E1.3: Establecer el objetivo de la auditoría '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E1.4: Determinar los puntos que será evaluados en la auditoría '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E1.5: Elaborar planes, Programas y presupuestos para realizar la auditoría '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E1.6: Identificar y seleccionar los métodos, procedimientos, instrumentos y herramientas necesarias para la auditoría'));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E1.7: Asignar los recursos y sistemas computacionales para la auditoría '));
        $this->ln();
        $this->ChapterTitle('Etapa 2: ',utf8_decode(' Ejecución de la auditoría '));
        $this->SetFont('Times','',12);
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E2.1: Realizar la acciones programadas para la auditoría '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E2.2: Aplicar los instrumentos y herramientas para la auditoría '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E2.3: Identificar y elaborar los documentos de desviaciones  '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E2.4: Elaborar el dictamen preliminar y presentarlo a discusión '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E2.5: Integrar el legajo de papeles de trabajo de la auditoría '));
        $this->ln();
        $this->ChapterTitle('Etapa 3: ',utf8_decode(' Dictamen de la Auditoría'));
        $this->SetFont('Times','',12);
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E3.1: Analizar la información y elaborar un informe de situaciones detectadas  '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E3.2: Elaborar el dictamen final  '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,chr(149),utf8_decode('E3.3: Presentar el informe de auditoría '));
        $this->ln();
        $this->ChapterTitle('1.6.2: ',utf8_decode('TÉCNICAS'));
        $this->TOC_Entry('1.6.2 TECNICAS', 2);
        $this->SetFont('Times','',12);
        $this->MultiCell(0,5,utf8_decode('En este proyecto de auditoría se hará uso de las siguientes técnicas:'));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,'1) ',utf8_decode('Entrevista.- Se haré el uso de esta técnica para la recopilación de información (tareas del personal, cumplimiento de funciones) de esta forma se tendrá un panorama amplio de la problemática, desde el punto de vista del personal y usuarios '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,'2) ',utf8_decode('Observación.- Esta es una de las técnicas de la cual se hará uso con más frecuencia, tanto en la planificación de la auditoría (visita preliminar) y la ejecución. '));
        $this->ln();
        $this->MultiCellBlt($column_widthM,5,'3) ',utf8_decode('Inventario.- Esta técnica se aplicará en la evaluación de hardware y software para verificar la existencia de los componentes de los equipos y coincida con los documentos d e inventario proporcionado por la universidad
        '));
        $this->ln();





    }
 
    
    function ChapterBody()
    {
        // Read text file
      
        include("Conexion.php") ;
        $column_width = ($this->GetPageWidth()-20);
        $con=1;
        $id=$_REQUEST['id_proyecto'];
        $query2 = "SELECT * from introduccion where introduccion.id_proyecto = '$id' ";
        $res2 = mysqli_query($conexion, $query2);
       
        $this->ChapterTitle(1.1,'INTRODUCCION');
        $this->TOC_Entry('1.1 INTRODUCCION', 1);
        
        // Times 12
        $this->SetFont('Times','',12);
        // Output justified text
        while($row = $res2->fetch_assoc()){
            $this->SetTextColor(0,0,0);
            $this->MultiCell(0,5,$row['contenido']);
            $this->Ln(2);
        }
       
        // Line break
        $this->Ln();
        // Mention in italics
       // $this->SetFont('','I');
       // $this->Cell(0,5,'(end of excerpt)');
       $this->ChapterTitle(1.2,'ANTECEDENTES');
       $this->TOC_Entry('1.2 ANTECEDENTES', 1);
      
       $this->ChapterTitle('1.2.1','ANTECEDENTES DE LA INSTITUCION');
       $this->TOC_Entry('1.2.1 ANTECEDENTES DE LA INSTITUCION', 2);
       $this->subtitulo('ASPECTO HISTORICO');
       $this->SetFont('Times','',12);
       $antecedente = "SELECT * from antecedentes where antecedentes.id_proyecto='$id'";
       $ran = mysqli_query($conexion,$antecedente);
        $rowA = $ran -> fetch_assoc();
        $this->MultiCell(0,5,$rowA['aspecto']);
        $this->ln(10);
        $this->tabla();
        
        $this->subtitulo('MISION Y VISION INSTITUCIONAL');
        $this->subtitulo('MISION');
        $this->MultiCell(0,5,$rowA['mision']);
        $this->Ln();
        $this->subtitulo('VISION');
        $this->MultiCell(0,5,$rowA['vision']);
        $this->Ln();

        $this->ChapterTitle(1.3,'ORIGENES');
        $this->TOC_Entry('1.3 ORIGENES', 1);
        $this->ChapterTitle('1.3.1','ORIGEN DE AUDITORIA');
        $this->TOC_Entry('1.3.1 ORIGEN DE LA AUDITORIA', 2);
        $this->SetFont('Times','',12);
        $origen = "SELECT * from origen where origen.id_proyecto='$id'";
        $ro = mysqli_query($conexion, $origen);
        $rowO = $ro -> fetch_assoc();
        $this->MultiCell(0,5,$rowO['contenido']);
        $this->Ln();
        $this->ChapterTitle('1.3.2','VISITA PRELIMINAR');
        $this->TOC_Entry('1.3.2 VISITA PRELIMINAR', 2);
        $visita = "SELECT * from visita where visita.id_proyecto='$id'";
        $rv = mysqli_query($conexion, $visita);
        while($rowV = $rv -> fetch_assoc()){
        $this->ChapterTitle('1.3.2.'.$con,$rowV['titulo']);
          $this->TOC_Entry('1.3.2.'.$con.' '.$rowV['titulo'], 3);
            $this->SetFont('Times','',12);
            $this->MultiCell(0,5,$rowV['contenido']);
            $this->Ln();
            $con++;
        }
        $this->ChapterTitle('1.3.3','OBJETIVOS DEL PROYECTO');
        $this->TOC_Entry('1.3.3 OBJETIVOS DEL PROYECTO', 2);
        $this->SetFont('Times','',12);
        $general = "SELECT * from objetivog where objetivog.id_proyecto='$id'";
        $rg = mysqli_query($conexion, $general);
        $rowGe = $rg -> fetch_assoc();
        $this->ChapterTitle('1.3.3.1','OBJETIVO GENERAL');
        $this->TOC_Entry('1.3.3.1 OBJETIVO GENERAL', 3);
        $this->SetFont('Times','',12);
        $this->MultiCell(0,5,$rowGe['contenido']);
        $this->Ln();
        $this->ChapterTitle('1.3.3.1','OBJETIVOS ESPECIFICOS');
        $this->TOC_Entry('1.3.3.2 OBJETIVOS ESPECIFICOS', 3);
        $this->SetFont('Times','',12);
        $especifico = "SELECT * from objetivoe where objetivoe.id_proyecto='$id'";
        $re = mysqli_query($conexion, $especifico);
        while($rowEs = $re->fetch_assoc()){
            
            $this->MultiCellBlt($column_width,5,chr(149),$rowEs['contenido']);
            $this->Ln();

        }

        $texto = 'Para cumplir con el objetivo de esta auditoría informáticase llevará a cabo la evaluación de  los siguientes puntos: ';
     
        $this->ChapterTitle('1.4','DETERMINAR LOS PUNTOS A SER EVALUADOS');
        $this->TOC_Entry('1.4 DETERMINAR LOS PUNTOS A SER EVALUADOS', 1);
        $this->SetFont('Times','',12);
        $this->SetTextColor(0,0,0);
        $this->MultiCell(0,5,utf8_decode($texto));
        $this->ln();
        $puntos = " SELECT * FROM puntos where puntos.id_proyecto='$id'";
        $rp = mysqli_query($conexion,$puntos);
        while ($rowP = $rp->fetch_assoc()){
            $this->MultiCellBlt($column_width,5,chr(149),$rowP['contenido']);
            $this->Ln();
        }
        
        $this->addpage();
       $this->actividades();
        $this-> metodologia();
        $this -> ln();
        
        $this->ChapterTitle('1.6.3','HERRAMIENTAS');
        $this->TOC_Entry('1.6.3 HERRAMIENTAS', 2);
        $this->SetFont('Times','',12);
        $this->MultiCell(0,5,utf8_decode('En este proyecto de hará el uso de las siguientes herramientas: '));
        $this -> ln();
        $herramientas = "SELECT * from herramienta where herramienta.id_proyecto = '$id'";
        $rh = mysqli_query($conexion, $herramientas);
        $conh = 1;
        while($rowH = $rh->fetch_assoc()){
            $this->MultiCellBlt($column_width,5,$conh.') ',$rowH['contenido']);
            $this->ln();
            $conh++;
        }
        $this->tablaguia();
        $this-> ln();
        $this->ChapterTitle('1.8','ASIGNACION DE RECURSOS PARA LA AUDITORIA');
        $this->TOC_Entry('1.8 ASIGNACION DE RECURSOS PARA LA AUDITORIA', 1);
        $this->ChapterTitle('1.8.1','RECURSOS TECNICOS');
        $this->TOC_Entry('1.8.1 RECURSOS TECNICOS', 2);
        $this->SetFont('Times','',12);
        $this->MultiCell(0,5,utf8_decode('Se utilizaran los siguientes recursos técnicos: '));
        $this-> ln();
        $tecnicos = "SELECT * from tecnicos where tecnicos.id_proyecto='$id'";
        $rtec = mysqli_query($conexion, $tecnicos);
        while($rowtec = $rtec->fetch_assoc()){
            $this->MultiCellBlt($column_width,5,chr(149),$rowtec['recurso']);
            $this->Ln();
        }

        $this->ChapterTitle('1.8.2','RECURSOS ECONOMICOS');
        $this->TOC_Entry('1.8.2 RECURSOS ECONOMICOS', 2);
        $this->SetFont('Times','',12);
        $this->MultiCell(0,5,utf8_decode('La siguiente tabla demuestra la derogación de los gastos quegenera para la elaboraciónde este proyecto de auditoría. '));
        $this-> ln();
        $this->SetX(35);
    $this->SetFont('Times','',12);
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
    $this->Cell(70,7,'Descripcion',1,0,'C',true);
    $this->Cell(70,7,'Costo(Bs.)',1,1,'C',true);
    $economico = "SELECT * from economico where economico.id_proyecto='$id'";
    $reco = mysqli_query($conexion,$economico);
    $sumaEco=0;
    while($rowEco=$reco->fetch_assoc()){
        $this->SetTextColor(0,0,0);
        $this->SetX(35);
        $this->Cell(70,7,$rowEco['recurso'],1,0,'C',0);
    $this->Cell(70,7,$rowEco['costo'],1,1,'C',0);

    $sumaEco = $rowEco['costo']+$sumaEco;
    }
    $this->SetX(35);
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
    $this->Cell(70,7,'COSTO TOTAL ',1,0,'C',true);
    $this->Cell(70,7,$sumaEco,1,1,'C',true);
     
   
       
        



      
     

    }
    
    function tabla()
    {
        include("Conexion.php") ;
        $id=$_REQUEST['id_proyecto'];
    $gen = "SELECT * from generalidades where generalidades.id_proyecto='$id'";
    $rGen = mysqli_query($conexion,$gen);
    $rowG = $rGen -> fetch_assoc();

    $this-> TituloTabla('GENERALIDADES DE LA EMPRESA');
    
    $this->SetX(45);
    $this->SetFont('Times','',12);
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
    $this->Cell(50,7,'Pais',1,0,'C',true);
    $this->SetTextColor(0,0,0);
    $this->Cell(70,7,$rowG['pais'],1,1,'C',0);
    
    $this->SetX(45);
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
    $this->Cell(50,7,'Departamento',1,0,'C',true);
    $this->SetTextColor(0,0,0);
    $this->Cell(70,7,$rowG['departamento'],1,1,'C',0);

    $this->SetX(45);
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
     $this->Cell(50,7,'Provincia',1,0,'C',true);
    $this->SetTextColor(0,0,0);
    $this->Cell(70,7,$rowG['provincia'],1,1,'C',0);
    
    $this->SetX(45);
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
    $this->Cell(50,7,'Direccion',1,0,'C',true);
    $this->SetTextColor(0,0,0);
    $this->Cell(70,7,$rowG['direccion'],1,1,'C',0);

    $this->SetX(45);
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
    $this->Cell(50,7,'Telefono',1,0,'C',true);
    $this->SetTextColor(0,0,0);
    $this->Cell(70,7,$rowG['telefono'],1,1,'C',0);
    
    $this->SetX(45);
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
    $this->Cell(50,7,'Fax',1,0,'C',true);
    $this->SetTextColor(0,0,0);
    $this->Cell(70,7,$rowG['fax'],1,1,'C',0);

    $this->ln();
    $this-> TituloTabla('UBICACION GEOGRAFICA');
    $this->SetX(55);
    $this->Cell(100,75,$this->Image('../upload/'.$rowG['imagen'],$this->GetX(),$this->GetY(),100),0,1,'C');

    }



    function tablaguia(){
        include("Conexion.php") ;
        $id=$_REQUEST['id_proyecto'];
        $this->ChapterTitle('1.7','GUIAS DE AUDITORIA');
        $this->TOC_Entry('1.7 GUIAS DE AUDITORIA', 1);
        $guia = "SELECT * from guia where guia.id_proyecto='$id' ";
        $rguia = mysqli_query($conexion, $guia);
        while($rowGuia = $rguia->fetch_assoc()){
           
            $this->SetWidths(array(130,50));
            $this->Row(array('Punto a ser evaluado: '.$rowGuia['punto'],'Guia: '.$rowGuia['guia']));
            $this->SetWidths(array(20,30,30,30,30,10,30));
            $this->Row(array('Codigo',' Actividad que sera evaluado','Procedimien tos de auditoria','Herramientas que seran utilizados','Tecnicas que seran utilizados','%','Observaciones'));
        
            $this->SetWidths(array(20,30,30,30,30,10,30));
            $this->Row(array($rowGuia['codigo'],$rowGuia['actividad'],$rowGuia['procedimiento'],$rowGuia['herramienta'],$rowGuia['tecnica'],$rowGuia['porcentaje'],$rowGuia['observacion']));
            $this-> ln();
        }



    }
// modulo de ejecucion
function Rubrica(){
    include("Conexion.php") ;
    $id=$_REQUEST['id_proyecto'];
    $this -> AddPage();
    $this->ChapterTitle('1.2','RUBRICA DE EVALUACION');
    $this->TOC_Entry('1.2 RUBRICA DE EVALUACION', 1);
  
    $this->SetFont('Times','',12);
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
    $this->Cell(95,7,'Estado',1,0,'C',true);
    $this->Cell(95,7,'Porcentaje',1,1,'C',true);
    $this->SetFillColor(58, 191, 86 );
    $this->SetTextColor(255,255,255);
    $this->Cell(95,7,'EXCELENTE',0,0,'C',true);
    $this->Cell(95,7,'Porcentaje',0,1,'C',true);
    $this->SetFillColor(114, 242, 140);
    $this->SetTextColor(0,0,0);
    $this->Cell(95,7,'MUY BUENO',0,0,'C',true);
    $this->Cell(95,7,'Porcentaje',0,1,'C',true);
    $this->SetFillColor(253, 136, 32 );
    $this->SetTextColor(255,255,255);
    $this->Cell(95,7,'BUENO',0,0,'C',true);
    $this->Cell(95,7,'Porcentaje',0,1,'C',true);
    $this->SetFillColor(255, 254, 43);
    $this->SetTextColor(0,0,0);
    $this->Cell(95,7,'REGULAR',0,0,'C',true);
    $this->Cell(95,7,'Porcentaje',0,1,'C',true);
    $this->SetFillColor(195, 58, 52);
    $this->SetTextColor(255,255,255);
    $this->Cell(95,7,'MALO',0,0,'C',true);
    $this->Cell(95,7,'Porcentaje',0,1,'C',true);
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
    $this->Cell(90,7,'Aspecto a evaluar',1,0,'C',true);
    $this->Cell(50,7,'Porcentaje obtenido',1,0,'C',true);
    $this->Cell(50,7,'Estado',1,1,'C',true);
    $prom = 0;
    $suma=0;
    $promedio = 0;
    $queryR = "SELECT * from rubrica where rubrica.id_proyecto='$id'";
    $res = mysqli_query($conexion, $queryR);
    while($rowRu=$res->fetch_assoc()){
        $prom++;
        $suma = $suma+$rowRu['porcentaje'];
        $this->SetTextColor(0,0,0);
        $this->Cell(90,7,$rowRu['estado'],'B',0,'C',0);
        $this->SetTextColor(0,0,0);
        $this->Cell(50,7,$rowRu['porcentaje'].'%','B',0,'C',0);
        $this->SetTextColor(255,255,255);
        if($rowRu['porcentaje']<= 100 and $rowRu['porcentaje'] >=95 ){
            $this->SetFillColor(58, 191, 86 );
            $this->Cell(50,7,'EXCELENTE','B',1,'C',true);
        }elseif($rowRu['porcentaje']<= 94 and $rowRu['porcentaje'] >=90 ){
            $this->SetFillColor(114, 242, 140);
            $this->SetTextColor(0,0,0);
            $this->Cell(50,7,'MUY BUENO','B',1,'C',true);
        }elseif($rowRu['porcentaje']<= 89 and $rowRu['porcentaje'] >=75 ){
            $this->SetFillColor(253, 136, 32 );
            $this->Cell(50,7,'BUENO','B',1,'C',true);
        }elseif($rowRu['porcentaje']<= 74 and $rowRu['porcentaje'] >=51 ){
            $this->SetFillColor(255, 254, 43);
            $this->SetTextColor(0,0,0);
            $this->Cell(50,7,'REGULAR','B',1,'C',true);
        }elseif($rowRu['porcentaje']<= 50 and $rowRu['porcentaje'] >=0 ){
            $this->SetFillColor(195, 58, 52);
            $this->Cell(50,7,'MALO','B',1,'C',true);
        }
      
    }
    if($prom==0){
        $promedio='';
    }else{

   
    $promedio= $suma/($prom);
    }
    $this->SetFillColor(0,0,0);
    $this->Cell(50,7,'Promedio: ',1,0,'C',true);
    $this->SetFillColor(255,255,255);
    $this->SetTextColor(0,0,0);
    $this->Cell(140,7,$promedio.'%',1,1,'C',true);
}

function desviaciones(){
    $aux = 0;
    include("Conexion.php") ;
    $id=$_REQUEST['id_proyecto'];
    $this->ChapterTitle(1.3,'DESVIACIONES');
    $this->TOC_Entry('1.3 DESVIACIONES', 1);
   
   
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
    $this->Cell(10,15,'#',1,0,'C',true);
   $this->Cell(40,15,'SITUACIONES',1,0,'C',true);
    $this->Cell(30,15,'CAUSAS',1,0,'C',true);
    $this->Cell(30,15,'SOLUCION',1,0,'C',true);
    $this->Cell(20,15,'FECHA',1,0,'C',true);
    $this->Cell(30,15,'RESPONSABLE',1,0,'C',true);
    $this->Cell(30,15,'EVIDENCIA',1,1,'C',true);
    $queryEv = "SELECT * from desviacion where desviacion.id_proyecto='$id'";
    $resEv = mysqli_query($conexion, $queryEv);
    while($rowEv = $resEv->fetch_assoc()){
        $aux++;
        $this->SetTextColor(0,0,0);
        $this->SetWidths(array(10,40,30,30,20,30,30));
        $this->Row(array($aux,$rowEv['situacion'],$rowEv['causa'],$rowEv['solucion'],$rowEv['fecha'],$rowEv['responsable'],$rowEv['evidencia']));
       
    }
    $this-> ln();

}




function ChapterBodyE(){
    include("Conexion.php") ;
    $conexion->set_charset('utf8');
    $column_width = ($this->GetPageWidth()-20);
    $id=$_REQUEST['id_proyecto'];
    $this->SetTextColor(0,0,0);
    $this->ChapterTitle(1.1,'INTRODUCCION');
    $this->TOC_Entry('1.1 INTRODUCCION', 1);
    // Times 12
    $this->SetFont('Times','',12);
    // Output justified text
    $this->MultiCell(0,5,utf8_decode('La ejecución es la etapa más importante d e la auditoría, ésta determinará si el trabajo alcanzó los objetivos establecidos en la planificación, es por esta razón que el desarrollo debe seguir una serie de pasos a cumplir de forma precisa.'));
    $this-> ln();
    $this->subtitulo('En el siguiente grafico se muestra los pasos a seguir:');
    $this->ln();
    $this->Rubrica();
    $this->ln();
    $queryau="SELECT * from elementos where elementos.id_proyecto = '$id'";
    $resau = mysqli_query($conexion, $queryau);
    while($rowAu=$resau->fetch_assoc()){
        $idau = $rowAu['id_el'];
        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','',12);
        $this->MultiCell(0,5,utf8_decode($rowAu['contenido']));
        $this->TOC_Entry(utf8_decode($rowAu['contenido']), 2);
        $this->ln();
        $this->subtitulo('Alcance de la auditoria');
        $this->TOC_Entry('Alcance de la auditoria', 3);
        $queryalc = "SELECT * from alcance where alcance.id_el='$idau' and alcance.id_proyecto='$id'";
        $resalc = mysqli_query($conexion, $queryalc);
        while($rowalc = $resalc->fetch_assoc()){
            $this->MultiCellBlt($column_width,5,chr(149),utf8_decode($rowalc['contenido']));
            $this->ln();
        }
        $this->subtitulo('Objetivos de la auditoria');
        $this->TOC_Entry('Objetivos de la auditoria', 3);
        $queryobj= "SELECT * from objetivoa where objetivoa.id_el='$idau' and objetivoa.id_proyecto='$id'";
        $resobja= mysqli_query($conexion, $queryobj);
        while($rowobja = $resobja->fetch_assoc()){
            $this->MultiCellBlt($column_width,5,chr(149),utf8_decode($rowobja['contenido']));
            $this->ln();
        }
        $this->subtitulo('Informe de auditoria');
        $this->TOC_Entry('Informe de auditoria', 3);
        $queryinf = "SELECT * from informe where informe.id_el='$idau' and informe.id_proyecto='$id'";
        $resinf = mysqli_query($conexion, $queryinf);
        while($rowinf = $resinf->fetch_assoc()){
            $this->MultiCellBlt($column_width,5,chr(149),utf8_decode($rowinf['contenido']));
            $this->ln();
        }
    }
    $this-> desviaciones();
    
}
function ChapterBodyD(){
    include("Conexion.php") ;
    $id=$_REQUEST['id_proyecto'];
    $this->TituloTabla('DICTAMEN');
    $this->TOC_Entry('DICTAMEN DE LA AUDITORIA', 1);
    $this->ln();
    $queryDic="SELECT * from dictamen where dictamen.id_proyecto='$id'";
    $resDic=mysqli_query($conexion, $queryDic);
    $rowDic= $resDic->fetch_assoc();
    $this->multicell(0,5,'PARA:'.$rowDic['para']);
    $this->ln();
    $this->multicell(0,5,'DE: '.$rowDic['de']);
    $this->ln();
    $this->multicell(0,5,'PROYECTO: '.$rowDic['proyecto']);
    $this->ln();
    $this->multicell(0,10,'FECHA: '.$rowDic['fecha'],'B');
    $this->ln();
    $this->MultiCell(0,5,$rowDic['contenido']);
    $this->tableConclusion();

}
function tableConclusion(){
    include("Conexion.php") ;
    $id=$_REQUEST['id_proyecto'];
    $con=0;
    $this->addpage();
    $this->SetFont('Times','',12);
    $this->SetFillColor(0,0,0);
    $this->SetTextColor(255,255,255);
    $this->Cell(10,7,'N#',1,0,'C',true);
    $this->Cell(45,7,'TAREA',1,0,'C',true);
    $this->Cell(45,7,'CONCLUSIONES',1,0,'C',true);
    $this->Cell(45,7,'SOLUCIONES',1,0,'C',true);
    $this->Cell(45,7,'RECOMENDACIONES',1,1,'C',true);
    $queryConclu="SELECT * from conclusion where conclusion.id_proyecto='$id'";
    $resConclu=mysqli_query($conexion, $queryConclu);
    while($rowConclu = $resConclu->fetch_assoc()){
        $con++;
        $this->SetTextColor(0,0,0);
        $this->SetWidths(array(10,45,45,45,45));
        $this->Row(array($con,$rowConclu['tarea'],$rowConclu['con'],$rowConclu['sol'],$rowConclu['recomendacion']));
    }
    
}


    function caratula(){
        include("Conexion.php") ;
        $id=$_REQUEST['id_proyecto'];
        $this->TituloApendice('AUDITORIA INFORMATICA');
        $queryPro = "SELECT * from proyecto where proyecto.id_proyecto='$id'";
        $resPro = mysqli_query($conexion,$queryPro);
        $rowPro = $resPro->fetch_assoc();
     
        $this->Cell(190,150,$this->Image('../upload/'.$rowPro['imagen'],30,50,150),0,1,'C');
        $this->SetX(70);
    $this->SetFont('Times','',12);
   
    $this->SetTextColor(0,0,0);
    $this->Cell(70,7,'Nombre Auditor: Carlos Aguilar',0,1,'C',0);
    $this->SetX(70);
    $this->Cell(70,7,'Nombre Empresa: NextOne',0,1,'C',0);
    $this->SetX(70);
    $this->Cell(70,7,'Cochabamba-Bolivia',0,1,'C',0);

    }


    

    function PrintChapter($title)
    {
        $this->TOC_Entry('Apendice P', 0);
        $this->TituloApendice($title);
      
        $this->ChapterBody();
    }
    function PrintChapterE($title){

        $this->Addpage();
        $this->TOC_Entry('Apendice E', 0);
        $this->SetTextColor(0,0,0);
   
        $this->TituloApendice($title);
        $this->ChapterBodyE();
    }
    function PrintChapterD($title){
        $this->Addpage();
        $this->TOC_Entry('Apendice D', 0);
        $this->SetTextColor(0,0,0);
   
        $this->TituloApendice($title);
        $this->ChapterBodyD();
    }
    }

    //mc_table



    
    $pdf = new PDF();
    
    $pdf->SetFont('Times','',12);
    $pdf->AddPage();
    $pdf->caratula();
    $pdf->addpage();
    $pdf->startPageNums();
    $pdf->PrintChapter('PLANEACION DE LA AUDITORIA');
    $pdf->PrintChapterE('EJECUCION DE LA AUDITORIA');
    $pdf->PrintChapterD('DICTAMEN DE LA AUDITORIA');
    $pdf->stopPageNums();
    $pdf->SetTextColor(0,0,0);
    $pdf->insertTOC(2);
   
    $pdf->Output();

?>