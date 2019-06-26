
<?php
/* 
 * Controller Class avaliacao_desempenho
 */
include_once ("../model/avaliacao_desempenhoDAO.php");
function dateconvert($date,$func) {
  if (trim($date) == "")
  {
    return $date;
  }
  else
  {
    if ($func == 1)
    { //insert conversion
      list($day, $month, $year) = split('[/.-]', $date);
      $date = "$year-$month-$day";
      return $date;
    }
    if ($func == 2)
    { //output conversion
      list($year, $month, $day) = split('[-.]', $date);
      $date = "$day/$month/$year";
      return $date;
    }
  }
}
  
class avaliacao_desempenhoControl 
{
  /* Constructor */
  function avaliacao_desempenhoControl()
  {
    session_start();
    /* Identify the variable send by the view form in a hidden field */
    $option = $_REQUEST['option'];
    switch( $option )
    {
      case 'insert':
        {
          $model = new avaliacao_desempenhoDAO();
          // Fields from avaliacao_desempenho class
          $model->setcod_avaliacao( $_REQUEST['cod_avaliacao'] );
          $model->setdescricao_avaliacao( $_REQUEST['descricao_avaliacao'] );

          if( $model->Insert() )
          {
            header( "Location: ../view/avaliacao_desempenhoViewCon.php" );
          }
          else
          {
            header( "Location: ../index.php" );
          }
          break;
        }
      case 'update':
        {
          $model = new avaliacao_desempenhoDAO();
          // Fields from avaliacao_desempenho class
          $model->setcod_avaliacao( $_REQUEST['cod_avaliacao'] );
          $model->setdescricao_avaliacao( $_REQUEST['descricao_avaliacao'] );

          if( $model->Update() )
          {
            header( "Location: ../view/avaliacao_desempenhoViewCon.php" );
          }
          else
            header( "Location: ../index.php" );
          break;
        }
      case 'delete':
        {
          $model = new avaliacao_desempenhoDAO();
          $model->setcod_avaliacao( $_REQUEST['cod_avaliacao'] );
          $model->setdescricao_avaliacao( $_REQUEST['descricao_avaliacao'] );

          if( $model->Delete() )
          {
            header( "Location: ../view/avaliacao_desempenhoViewCon.php" );
          }
          else
            header( "Location: ../index.php" );
          break;
        }
      case 'cancel':
        {
          $_SESSION['cod_avaliacao'] = '';
          $_SESSION['descricao_avaliacao'] = '';

          header( "Location: ../view/avaliacao_desempenhoViewCon.php" );
          break;
        }
      case 'add':
        {
          $_SESSION['cod_avaliacao'] = '';
          $_SESSION['descricao_avaliacao'] = '';

          $_SESSION['option'] = "insert";
          header( "Location: ../view/avaliacao_desempenhoViewUpd.php" );
          break;
        }
      case 'remove':
        {
          $model = new avaliacao_desempenhoDAO();
          $model->setcod_avaliacao( $_REQUEST['cod_avaliacao'] );
          $model->setdescricao_avaliacao( $_REQUEST['descricao_avaliacao'] );

          $result = $model->Query_Key();
          while( $r = mysql_fetch_array( $result ) )
          {
          $_SESSION['cod_avaliacao'] = $r[0];
          $_SESSION['descricao_avaliacao'] = $r[1];

          }
          $_SESSION['option'] = "delete";
          header( "Location: ../view/avaliacao_desempenhoViewUpd.php" );
          break;
        }
      case 'query':
        {
          $model = new avaliacao_desempenhoDAO();
          $model->setcod_avaliacao( $_REQUEST['cod_avaliacao'] );
          $model->setdescricao_avaliacao( $_REQUEST['descricao_avaliacao'] );

          $result = $model->Query_Key();
          while( $r = mysql_fetch_array( $result ) )
          {
          $_SESSION['cod_avaliacao'] = $r[0];
          $_SESSION['descricao_avaliacao'] = $r[1];

          }
          $_SESSION['option'] = "query";
          header( "Location: ../view/avaliacao_desempenhoViewUpd.php" );
          break;
        }
      case 'open':
        {
          $model = new avaliacao_desempenhoDAO();
          $model->setcod_avaliacao( $_REQUEST['cod_avaliacao'] );
          $model->setdescricao_avaliacao( $_REQUEST['descricao_avaliacao'] );

          $result = $model->Query_Key();
          while( $r = mysql_fetch_array( $result ) )
          {
          $_SESSION['cod_avaliacao'] = $r[0];
          $_SESSION['descricao_avaliacao'] = $r[1];

          }
          $_SESSION['option'] = "update";
          header( "Location: ../view/avaliacao_desempenhoViewUpd.php" );
          break;
        }
    }
  }
  /*
   * Function to return a resultset to view with all records 
   */
  function Query_Everyone()
  {
    $model = new avaliacao_desempenhoDAO();
    $result = $model->Query_All();
    return $result;
  }
  /*
   * Function to return a resultset to view 
   */
  function Query_Result()
  {
    $model = new avaliacao_desempenhoDAO();
          $model->setcod_avaliacao( $_SESSION['cod_avaliacao'] );
          $model->setdescricao_avaliacao( $_SESSION['descricao_avaliacao'] );

    $result = $model->Query_Filter();
    return $result;
  }
  /*
   * Function to return a resultset to populate a combo (select) 
   */
  function Query_Combo_Result( $fields )
  {
    $model = new avaliacao_desempenhoDAO();
    $result = $model->Query_Combo( $fields );
    return $result;
  }
}
$control = new avaliacao_desempenhoControl();
?>
