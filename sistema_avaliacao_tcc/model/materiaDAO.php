
<?php
/* 
 * Persistent Class materia
 */
include_once ("materia.php");
include_once ("db/connection.php");
class materiaDAO extends materia
{ 
  /* Database Connection  */ 
  var $bd;
  /* Constructor: Connect with database */
  function materiaDAO()
  {
    $this->bd = new ConnectionBD();
  }
  
  /*
   * Insert Method
   */
  function Insert()
  {
    $sql = "insert into materia ( descricao_materia ) ".
           " values ".
           " ( '".$this->getdescrica_materia()."' )"; 
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
    $sql = "update materia set ".
            "descricao_materia = '".$this->getdescrica_materia()."' ".
           " where ".
            "cod_materia = ".$this->getcod_materia().
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
    $sql = "delete from materia where ".
            "cod_materia = ".$this->getcod_materia().
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
    $sql = "select cod_materia , descricao_materia from materia" ;
    $result = mysql_query( $sql );
    return $result;
  }
  
  /*
   * Query Method to return all records with just two fields to populate a combo (select)
   */
  function Query_Combo( $filter )
  {
    $sql = "select ".$filter." from materia" ;
    $result = mysql_query( $sql );
    return $result;
  }
  
  /*
   * Query Method to return one record by the key fields
   */
  function Query_Key()
  {
    $sql = "select cod_materia , descricao_materia from materia where ". 
            "cod_materia = ".$this->getcod_materia().
           " ";
    $result = mysql_query( $sql );
    return $result;
  }
  
  /*
   * Query Method to return records with match to the filter
   */
  function Query_Filter()
  {
    $sql = "select cod_materia , descricao_materia from materia where 1=1 ";
    if ( $this->getcod_materia() != "" ) 
      $sql = $sql . " and cod_materia = ".$this->getcod_materia();
    if ( $this->getdescrica_materia() != "" ) 
      $sql = $sql . " and descrica_materia like '%".$this->getdescrica_materia()."%' ";

    $result = mysql_query( $sql );
    return $result;
  }
  
}
$materiaDAO = new materiaDAO();
?>
