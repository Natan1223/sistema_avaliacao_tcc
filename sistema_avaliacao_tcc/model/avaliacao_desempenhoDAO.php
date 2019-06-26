
<?php
/* 
 * Persistent Class avaliacao_desempenho
 */
include_once ("avaliacao_desempenho.php");
include_once ("db/connection.php");
class avaliacao_desempenhoDAO extends avaliacao_desempenho
{ 
  /* Database Connection  */ 
  var $bd;
  /* Constructor: Connect with database */
  function avaliacao_desempenhoDAO()
  {
    $this->bd = new ConnectionBD();
  }
  
  /*
   * Insert Method
   */
  function Insert()
  {
    $sql = "insert into avaliacao_desempenho (  descricao_avaliacao ) ".
           " values ".
           " (  '".$this->getdescricao_avaliacao()."' )"; 
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
    $sql = "update avaliacao_desempenho set ".
            "descricao_avaliacao = '".$this->getdescricao_avaliacao()."' ".
           " where ".
            "cod_avaliacao = ".$this->getcod_avaliacao().
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
    $sql = "delete from avaliacao_desempenho where ".
            "cod_avaliacao = ".$this->getcod_avaliacao().
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
    $sql = "select cod_avaliacao , descricao_avaliacao from avaliacao_desempenho" ;
    $result = mysql_query( $sql );
    return $result;
  }
  
  /*
   * Query Method to return all records with just two fields to populate a combo (select)
   */
  function Query_Combo( $filter )
  {
    $sql = "select ".$filter." from avaliacao_desempenho" ;
    $result = mysql_query( $sql );
    return $result;
  }
  
  /*
   * Query Method to return one record by the key fields
   */
  function Query_Key()
  {
    $sql = "select cod_avaliacao , descricao_avaliacao from avaliacao_desempenho where ". 
            "cod_avaliacao = ".$this->getcod_avaliacao().
           " ";
    $result = mysql_query( $sql );
    return $result;
  }
  
  /*
   * Query Method to return records with match to the filter
   */
  function Query_Filter()
  {
    $sql = "select cod_avaliacao , descricao_avaliacao from avaliacao_desempenho where 1=1 ";
    if ( $this->getcod_avaliacao() != "" ) 
      $sql = $sql . " and cod_avaliacao = ".$this->getcod_avaliacao();
    if ( $this->getdescricao_avaliacao() != "" ) 
      $sql = $sql . " and descricao_avaliacao like '%".$this->getdescricao_avaliacao()."%' ";

    $result = mysql_query( $sql );
    return $result;
  }
  
}
$avaliacao_desempenhoDAO = new avaliacao_desempenhoDAO();
?>
