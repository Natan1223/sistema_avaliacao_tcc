
<?php
/* 
 * Controller Class materia
 */
include_once ("../model/materiaDAO.php");
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
  
class materiaControl 
{
  /* Constructor */
  function materiaControl()
  {
    session_start();
    /* Identify the variable send by the view form in a hidden field */
    $option = $_REQUEST['option'];
    switch( $option )
    {
      case 'insert':
        {
          $model = new materiaDAO();
          // Fields from materia class
          //$model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setdescrica_materia( $_REQUEST['descrica_materia'] );

          if( $model->Insert() )
          {
            header( "Location: ../view/materiaViewCon.php" );
          }
          else
          {
           // header( "Location: ../index.php" );
          }
          break;
        }
      case 'update':
        {
          $model = new materiaDAO();
          // Fields from materia class
          $model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setdescrica_materia( $_REQUEST['descrica_materia'] );

          if( $model->Update() )
          {
            header( "Location: ../view/materiaViewCon.php" );
          }
          else
            header( "Location: ../index.php" );
          break;
        }
      case 'delete':
        {
          $model = new materiaDAO();
          $model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setdescrica_materia( $_REQUEST['descrica_materia'] );

          if( $model->Delete() )
          {
            header( "Location: ../view/materiaViewCon.php" );
          }
          else
            header( "Location: ../index.php" );
          break;
        }
      case 'cancel':
        {
          $_SESSION['cod_materia'] = '';
          $_SESSION['descrica_materia'] = '';

          header( "Location: ../view/materiaViewCon.php" );
          break;
        }
      case 'add':
        {
          $_SESSION['cod_materia'] = '';
          $_SESSION['descrica_materia'] = '';

          $_SESSION['option'] = "insert";
          header( "Location: ../view/materiaViewUpd.php" );
          break;
        }
      case 'remove':
        {
          $model = new materiaDAO();
          $model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setdescrica_materia( $_REQUEST['descrica_materia'] );

          $result = $model->Query_Key();
          while( $r = mysql_fetch_array( $result ) )
          {
          $_SESSION['cod_materia'] = $r[0];
          $_SESSION['descrica_materia'] = $r[1];

          }
          $_SESSION['option'] = "delete";
          header( "Location: ../view/materiaViewUpd.php" );
          break;
        }
      case 'query':
        {
          $model = new materiaDAO();
          $model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setdescrica_materia( $_REQUEST['descrica_materia'] );

          $result = $model->Query_Key();
          while( $r = mysql_fetch_array( $result ) )
          {
          $_SESSION['cod_materia'] = $r[0];
          $_SESSION['descrica_materia'] = $r[1];

          }
          $_SESSION['option'] = "query";
          header( "Location: ../view/materiaViewUpd.php" );
          break;
        }
      case 'open':
        {
          $model = new materiaDAO();
          $model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setdescrica_materia( $_REQUEST['descrica_materia'] );

          $result = $model->Query_Key();
          while( $r = mysql_fetch_array( $result ) )
          {
          $_SESSION['cod_materia'] = $r[0];
          $_SESSION['descrica_materia'] = $r[1];

          }
          $_SESSION['option'] = "update";
          header( "Location: ../view/materiaViewUpd.php" );
          break;
        }
    }
  }
  /*
   * Function to return a resultset to view with all records 
   */
  function Query_Everyone()
  {
    $model = new materiaDAO();
    $result = $model->Query_All();
    return $result;
  }
  /*
   * Function to return a resultset to view 
   */
  function Query_Result()
  {
    $model = new materiaDAO();
          $model->setcod_materia( $_SESSION['cod_materia'] );
          $model->setdescrica_materia( $_SESSION['descrica_materia'] );

    $result = $model->Query_Filter();
    return $result;
  }
  /*
   * Function to return a resultset to populate a combo (select) 
   */
  function Query_Combo_Result( $fields )
  {
    $model = new materiaDAO();
    $result = $model->Query_Combo( $fields );
    return $result;
  }
}
$control = new materiaControl();
?>
