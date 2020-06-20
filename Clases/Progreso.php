<?php
$bar = 0;

class Progreso{
    var $numero;
    var $nuevoNum;
    var $arreglo;
    var $array;

    

    public function suma($numero, $id){

   
    static $estatico = 0;
    $estatico += $numero;
    $this->array[$id]=$estatico;
    $this->numero = $id;   

    
    }

    public function mostrar()
    {
        $id = $this->numero;
        $GLOBALS['bar'] =$this->array[$id];
        $numero = $this->array[$id];
       
      
        return $numero;
    }
    public function arreglo($dato){

        return $this->array[$dato]=$dato;
    }
}

class ProgresoTotal{
    var $total;
    public function PT($valor){
        $this->total=$valor;
     
    }
    public function mt(){
        return $this->total;
    }
}





?>