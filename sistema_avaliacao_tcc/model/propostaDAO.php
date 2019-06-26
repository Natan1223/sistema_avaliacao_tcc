
<?php
/* 
 * Persistent Class proposta
 */
include_once ("proposta.php");
include_once ("db/connection.php");
class propostaDAO extends proposta
{ 
  /* Database Connection  */ 
  var $bd;
  /* Constructor: Connect with database */
  function propostaDAO()
  {
    $this->bd = new ConnectionBD();
  }
  
  /*
   * Insert Method
   */
  function Insert()
  {
    $sql = "insert into proposta ( contextualizacao , bibliografia , metodologia , objetivo_especifico , objetivo_geral , justificativa , problematica ,  integrantes , titulo_proposta , cod_materia , cod_grupo , cod_pesquisa , cod_udc_status_proposta ) ".
           " values ".
           " ( '".$this->getcontextualizacao()."' , '".$this->getbibliografia()."' , '".$this->getmetodologia()."' , '".$this->getobjetivo_especifico()."' , '".$this->getobjetivo_geral()."' , '".$this->getjustificativa()."' , '".$this->getproblematica()."' ,'".$this->getintegrantes()."' , '".$this->gettitulo_proposta()."' , ".$this->getcod_materia()." , ".$this->getcod_grupo()." , ".$this->getcod_pesquisa()." , ".$this->getcod_udc_status_proposta()." )"; 
    $_SESSION['msgerror'] = ''; 
    $result = mysql_query( $sql );
    if( !$result )
    {
      $_SESSION['msgerror'] = mysql_error();
      return false;
    }
    return true;
  }
  
  /*
   * Update Method
   */
  function Update()
  {
    $sql = "update proposta set ".
            "contextualizacao = '".$this->getcontextualizacao()."' ".
            " , bibliografia = '".$this->getbibliografia()."' ".
            " , metodologia = '".$this->getmetodologia()."' ".
            " , objetivo_especifico = '".$this->getobjetivo_especifico()."' ".
            " , objetivo_geral = '".$this->getobjetivo_geral()."' ".
            " , justificativa = '".$this->getjustificativa()."' ".
            " , problematica = '".$this->getproblematica()."' ".
            " , integrantes = '".$this->getintegrantes()."' ".
            " , titulo_proposta = '".$this->gettitulo_proposta()."' ".
            " , cod_materia = ".$this->getcod_materia().
            " , cod_grupo = ".$this->getcod_grupo().
            " , cod_pesquisa = ".$this->getcod_pesquisa().
            " , cod_udc_status_proposta = ".$this->getcod_udc_status_proposta().
           " where ".
            "cod_proposta = ".$this->getcod_proposta().
            " ";
    $_SESSION['msgerror'] = '';
    $result = mysql_query( $sql ); 
    if( !$result )
    {
      $_SESSION['msgerror'] = mysql_error();
      return false;
    }
    return true;
  }
  
  /*
   * Delete Method
   */
  function Delete()
  {
    $sql = "delete from proposta where ".
            "cod_proposta = ".$this->getcod_proposta().
           " ";
    $_SESSION['msgerror'] = '' ;
    $result = mysql_query( $sql );
    if( !$result )
    {
      $_SESSION['msgerror'] = mysql_error();
      return false;
    }
    return true;
  }
  
  /*
   * Query Method to return all records
   */
  function Query_All()
  {
    $sql = "select cod_proposta,contextualizacao , bibliografia , metodologia , objetivo_especifico , objetivo_geral , justificativa , problematica , cod_proposta , integrantes , titulo_proposta , cod_materia , cod_grupo , cod_pesquisa , cod_udc_status_proposta from proposta" ;
    $result = mysql_query( $sql );
    return $result;
  }
  
  /*
   * Query Method to return all records with just two fields to populate a combo (select)
   */
  function Query_Combo( $filter )
  {
    $sql = "select ".$filter." from proposta" ;
    $result = mysql_query( $sql );
    return $result;
  }
  
  function Combo()
  {
    $sql = "select * from grupo " ;
    $result = mysql_query( $sql );
    return $result;
  }
  /*
   * Query Method to return one record by the key fields
   */
  function Query_Key()
  {
    $sql = "select contextualizacao , bibliografia , metodologia , objetivo_especifico , objetivo_geral , justificativa , problematica , cod_proposta , integrantes , titulo_proposta , cod_materia , cod_grupo , cod_pesquisa , cod_udc_status_proposta from proposta where ". 
            "cod_proposta = ".$this->getcod_proposta().
           " ";
    $result = mysql_query( $sql );
    return $result;
  }
  
  /*
   * Query Method to return records with match to the filter
   */
  function Query_Filter()
  {
    $sql = "select contextualizacao , bibliografia , metodologia , objetivo_especifico , objetivo_geral , justificativa , problematica , cod_proposta , integrantes , titulo_proposta , cod_materia , cod_grupo , cod_pesquisa , cod_udc_status_proposta from proposta where 1=1 ";
    if ( $this->getcontextualizacao() != "" ) 
      $sql = $sql . " and contextualizacao like '%".$this->getcontextualizacao()."%' ";
    if ( $this->getbibliografia() != "" ) 
      $sql = $sql . " and bibliografia like '%".$this->getbibliografia()."%' ";
    if ( $this->getmetodologia() != "" ) 
      $sql = $sql . " and metodologia like '%".$this->getmetodologia()."%' ";
    if ( $this->getobjetivo_especifico() != "" ) 
      $sql = $sql . " and objetivo_especifico like '%".$this->getobjetivo_especifico()."%' ";
    if ( $this->getobjetivo_geral() != "" ) 
      $sql = $sql . " and objetivo_geral like '%".$this->getobjetivo_geral()."%' ";
    if ( $this->getjustificativa() != "" ) 
      $sql = $sql . " and justificativa like '%".$this->getjustificativa()."%' ";
    if ( $this->getproblematica() != "" ) 
      $sql = $sql . " and problematica like '%".$this->getproblematica()."%' ";
    if ( $this->getcod_proposta() != "" ) 
      $sql = $sql . " and cod_proposta = ".$this->getcod_proposta();
    if ( $this->getintegrantes() != "" ) 
      $sql = $sql . " and integrantes like '%".$this->getintegrantes()."%' ";
    if ( $this->gettitulo_proposta() != "" ) 
      $sql = $sql . " and titulo_proposta like '%".$this->gettitulo_proposta()."%' ";
    if ( $this->getcod_materia() != "" ) 
      $sql = $sql . " and cod_materia = ".$this->getcod_materia();
    if ( $this->getcod_grupo() != "" ) 
      $sql = $sql . " and cod_grupo = ".$this->getcod_grupo();
    if ( $this->getcod_pesquisa() != "" ) 
      $sql = $sql . " and cod_pesquisa = ".$this->getcod_pesquisa();
    if ( $this->getcod_udc_status_proposta() != "" ) 
      $sql = $sql . " and cod_udc_status_proposta = ".$this->getcod_udc_status_proposta();

    $result = mysql_query( $sql );
    return $result;
  }
  
}
$propostaDAO = new propostaDAO();
?>
