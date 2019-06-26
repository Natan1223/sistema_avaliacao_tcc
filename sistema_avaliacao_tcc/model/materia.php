
<?php 
/*
 * Class materia
 */
class materia
{ 
  /* Atributes */ 
  var $cod_materia;
  var $descrica_materia;
  /* Methods (set/get) */
  function setcod_materia( $cod_materia ) 
  { 
    $this->cod_materia = $cod_materia;
  }
  function getcod_materia()
  { 
    return $this->cod_materia;
  }
  function setdescrica_materia( $descrica_materia ) 
  { 
    $this->descrica_materia = $descrica_materia;
  }
  function getdescrica_materia()
  { 
    return $this->descrica_materia;
  }
}
?>
