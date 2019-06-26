
<?php 
/*
 * Class avaliacao_desempenho
 */
class avaliacao_desempenho
{ 
  /* Atributes */ 
  var $cod_avaliacao;
  var $descricao_avaliacao;
  /* Methods (set/get) */
  function setcod_avaliacao( $cod_avaliacao ) 
  { 
    $this->cod_avaliacao = $cod_avaliacao;
  }
  function getcod_avaliacao()
  { 
    return $this->cod_avaliacao;
  }
  function setdescricao_avaliacao( $descricao_avaliacao ) 
  { 
    $this->descricao_avaliacao = $descricao_avaliacao;
  }
  function getdescricao_avaliacao()
  { 
    return $this->descricao_avaliacao;
  }
}
?>
