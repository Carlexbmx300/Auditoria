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
    
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Text color in gray
        $this->SetTextColor(128);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
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
        $this->AddPage('L');
        $this->ChapterTitle(1.5,'CRONOGRAMA DE ACTIVIDADES');

    }

    function metodologia(){
        $column_widthM = ($this->GetPageWidth()-107);
        $me = 'La metodología que se aplicaré en el presente proyecto para la ejecuciónde auditoría informática, no tiene un nombre definido ya que es una especie de estándar ';
        $me2 ='A continuación se describe la metodología, en una serie de pasos (tres etapas fundamentales) que sedebe ejecutar en el mismo orden que se presenta: ';
        $this->AddPage('P');
        $this->ChapterTitle(1.6,'METODOLOGIA TECNICAS Y HERRAMIENTAS');
        $this->ChapterTitle('1.6.1','METODOLOGIA');
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
        $this->ChapterTitle('1.7.2: ',utf8_decode('TÉCNICAS'));
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
       $this->ChapterTitle('1.2.1','ANTECEDENTES DE LA INSTITUCION');
       $this->subtitulo('ASPECTO HISTORICO');
       $this->SetFont('Times','',12);
       $antecedente = "SELECT * from antecedentes where antecedentes.id_proyecto='$id'";
       $ran = mysqli_query($conexion,$antecedente);
        $rowA = $ran -> fetch_assoc();
        $this->MultiCell(0,5,$rowA['aspecto']);
        $this->ln(10);
        $this->tabla();
        $this->Ln();
        $this->subtitulo('MISION Y VISION INSTITUCIONAL');
        $this->subtitulo('MISION');
        $this->MultiCell(0,5,$rowA['mision']);
        $this->Ln();
        $this->subtitulo('VISION');
        $this->MultiCell(0,5,$rowA['vision']);
        $this->Ln();

        $this->ChapterTitle(1.3,'ORIGENES');
        $this->ChapterTitle('1.3.1','ANTECEDENTES DE LA INSTITUCION');
        $this->SetFont('Times','',12);
        $origen = "SELECT * from origen where origen.id_proyecto='$id'";
        $ro = mysqli_query($conexion, $origen);
        $rowO = $ro -> fetch_assoc();
        $this->MultiCell(0,5,$rowO['contenido']);
        $this->Ln();
        $this->ChapterTitle('1.3.2','VISITA PRELIMINAR');
        $visita = "SELECT * from visita where visita.id_proyecto='$id'";
        $rv = mysqli_query($conexion, $visita);
        while($rowV = $rv -> fetch_assoc()){
            $this->ChapterTitle('1.3.2.'.$con,$rowV['titulo']);
            $this->SetFont('Times','',12);
            $this->MultiCell(0,5,$rowV['contenido']);
            $this->Ln();
            $con++;
        }
        $this->ChapterTitle('1.3.3','OBJETIVOS DEL PROYECTO');
        $this->SetFont('Times','',12);
        $general = "SELECT * from objetivog where objetivog.id_proyecto='$id'";
        $rg = mysqli_query($conexion, $general);
        $rowGe = $rg -> fetch_assoc();
        $this->ChapterTitle('1.3.3.1','OBJETIVO GENERAL');
        $this->SetFont('Times','',12);
        $this->MultiCell(0,5,$rowGe['contenido']);
        $this->Ln();
        $this->ChapterTitle('1.3.3.1','OBJETIVOS ESPECIFICOS');
        $this->SetFont('Times','',12);
        $especifico = "SELECT * from objetivoe where objetivoe.id_proyecto='$id'";
        $re = mysqli_query($conexion, $especifico);
        while($rowEs = $re->fetch_assoc()){
            
            $this->MultiCellBlt($column_width,5,chr(149),$rowEs['contenido']);
            $this->Ln();

        }

        $texto = 'Para cumplir con el objetivo de esta auditoría informáticase llevará a cabo la evaluación de  los siguientes puntos: ';
     
        $this->ChapterTitle('1.4','DETERMINAR LOS PUNTOS A SER EVALUADOS');
        $this->SetFont('Times','',12);
        $this->MultiCell(0,5,utf8_decode($texto));
        $this->ln();
        $puntos = " SELECT * FROM puntos where puntos.id_proyecto='$id'";
        $rp = mysqli_query($conexion,$puntos);
        while ($rowP = $rp->fetch_assoc()){
            $this->MultiCellBlt($column_width,5,chr(149),$rowP['contenido']);
            $this->Ln();
        }

        $this -> actividades();
        $this-> metodologia();
        $this -> ln();
        
        $this->ChapterTitle('1.6.3','HERRAMIENTAS');
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
        $this->ChapterTitle('1.8.1','RECURSOS TECNICOS');
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

    }



    function tablaguia(){
        include("Conexion.php") ;
        $id=$_REQUEST['id_proyecto'];
        $this->ChapterTitle('1.7','GUIAS DE AUDITORIA');
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






    

    function PrintChapter($title)
    {
        $this->AddPage();
        $this->TituloApendice($title);
      
        $this->ChapterBody();
    }
    }

    //mc_table



    
    $pdf = new PDF();
 

    $pdf->PrintChapter('PLANEACION DE LA AUDITORIA');
    
   
    $pdf->Output();

?>