
<?php
/* 
 * Controller Class proposta
 */
include_once ("../model/propostaDAO.php");
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
  
class propostaControl 
{
  /* Constructor */
  function propostaControl()
  {
    session_start();
    /* Identify the variable send by the view form in a hidden field */
    $option = $_REQUEST['option'];
    switch( $option )
    {
      case 'insert':
        {
          $model = new propostaDAO();
          // Fields from proposta class
          $model->setcontextualizacao( $_REQUEST['contextualizacao'] );
          $model->setbibliografia( $_REQUEST['bibliografia'] );
          $model->setmetodologia( $_REQUEST['metodologia'] );
          $model->setobjetivo_especifico( $_REQUEST['objetivo_especifico'] );
          $model->setobjetivo_geral( $_REQUEST['objetivo_geral'] );
          $model->setjustificativa( $_REQUEST['justificativa'] );
          $model->setproblematica( $_REQUEST['problematica'] );
          $model->setcod_proposta( $_REQUEST['cod_proposta'] );
          $model->setintegrantes( $_REQUEST['integrantes'] );
          $model->settitulo_proposta( $_REQUEST['titulo_proposta'] );
          $model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setcod_grupo( $_REQUEST['cod_grupo'] );
          $model->setcod_pesquisa( $_REQUEST['cod_pesquisa'] );
          $model->setcod_udc_status_proposta( $_REQUEST['cod_udc_status_proposta'] );

          if( $model->Insert() )
          {
            header( "Location: ../view/propostaViewCon.php" );
          }
          else
          {
            header( "Location: ../index.php" );
          }
          break;
        }
      case 'update':
        {
          $model = new propostaDAO();
          // Fields from proposta class
          $model->setcontextualizacao( $_REQUEST['contextualizacao'] );
          $model->setbibliografia( $_REQUEST['bibliografia'] );
          $model->setmetodologia( $_REQUEST['metodologia'] );
          $model->setobjetivo_especifico( $_REQUEST['objetivo_especifico'] );
          $model->setobjetivo_geral( $_REQUEST['objetivo_geral'] );
          $model->setjustificativa( $_REQUEST['justificativa'] );
          $model->setproblematica( $_REQUEST['problematica'] );
          $model->setcod_proposta( $_REQUEST['cod_proposta'] );
          $model->setintegrantes( $_REQUEST['integrantes'] );
          $model->settitulo_proposta( $_REQUEST['titulo_proposta'] );
          $model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setcod_grupo( $_REQUEST['cod_grupo'] );
          $model->setcod_pesquisa( $_REQUEST['cod_pesquisa'] );
          $model->setcod_udc_status_proposta( $_REQUEST['cod_udc_status_proposta'] );

          if( $model->Update() )
          {
            header( "Location: ../view/propostaViewCon.php" );
          }
          else
            header( "Location: ../index.php" );
          break;
        }
      case 'delete':
        {
          $model = new propostaDAO();
          $model->setcontextualizacao( $_REQUEST['contextualizacao'] );
          $model->setbibliografia( $_REQUEST['bibliografia'] );
          $model->setmetodologia( $_REQUEST['metodologia'] );
          $model->setobjetivo_especifico( $_REQUEST['objetivo_especifico'] );
          $model->setobjetivo_geral( $_REQUEST['objetivo_geral'] );
          $model->setjustificativa( $_REQUEST['justificativa'] );
          $model->setproblematica( $_REQUEST['problematica'] );
          $model->setcod_proposta( $_REQUEST['cod_proposta'] );
          $model->setintegrantes( $_REQUEST['integrantes'] );
          $model->settitulo_proposta( $_REQUEST['titulo_proposta'] );
          $model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setcod_grupo( $_REQUEST['cod_grupo'] );
          $model->setcod_pesquisa( $_REQUEST['cod_pesquisa'] );
          $model->setcod_udc_status_proposta( $_REQUEST['cod_udc_status_proposta'] );

          if( $model->Delete() )
          {
            header( "Location: ../view/propostaViewCon.php" );
          }
          else
            header( "Location: ../index.php" );
          break;
        }
      case 'cancel':
        {
          $_SESSION['contextualizacao'] = '';
          $_SESSION['bibliografia'] = '';
          $_SESSION['metodologia'] = '';
          $_SESSION['objetivo_especifico'] = '';
          $_SESSION['objetivo_geral'] = '';
          $_SESSION['justificativa'] = '';
          $_SESSION['problematica'] = '';
          $_SESSION['cod_proposta'] = '';
          $_SESSION['integrantes'] = '';
          $_SESSION['titulo_proposta'] = '';
          $_SESSION['cod_materia'] = '';
          $_SESSION['cod_grupo'] = '';
          $_SESSION['cod_pesquisa'] = '';
          $_SESSION['cod_udc_status_proposta'] = '';

          header( "Location: ../view/propostaViewCon.php" );
          break;
        }
      case 'add':
        {
          $_SESSION['contextualizacao'] = '';
          $_SESSION['bibliografia'] = '';
          $_SESSION['metodologia'] = '';
          $_SESSION['objetivo_especifico'] = '';
          $_SESSION['objetivo_geral'] = '';
          $_SESSION['justificativa'] = '';
          $_SESSION['problematica'] = '';
          $_SESSION['cod_proposta'] = '';
          $_SESSION['integrantes'] = '';
          $_SESSION['titulo_proposta'] = '';
          $_SESSION['cod_materia'] = '';
          $_SESSION['cod_grupo'] = '';
          $_SESSION['cod_pesquisa'] = '';
          $_SESSION['cod_udc_status_proposta'] = '';

          $_SESSION['option'] = "insert";
          header( "Location: ../view/propostaViewUpd.php" );
          break;
        }
      case 'remove':
        {
          $model = new propostaDAO();
          $model->setcontextualizacao( $_REQUEST['contextualizacao'] );
          $model->setbibliografia( $_REQUEST['bibliografia'] );
          $model->setmetodologia( $_REQUEST['metodologia'] );
          $model->setobjetivo_especifico( $_REQUEST['objetivo_especifico'] );
          $model->setobjetivo_geral( $_REQUEST['objetivo_geral'] );
          $model->setjustificativa( $_REQUEST['justificativa'] );
          $model->setproblematica( $_REQUEST['problematica'] );
          $model->setcod_proposta( $_REQUEST['cod_proposta'] );
          $model->setintegrantes( $_REQUEST['integrantes'] );
          $model->settitulo_proposta( $_REQUEST['titulo_proposta'] );
          $model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setcod_grupo( $_REQUEST['cod_grupo'] );
          $model->setcod_pesquisa( $_REQUEST['cod_pesquisa'] );
          $model->setcod_udc_status_proposta( $_REQUEST['cod_udc_status_proposta'] );

          $result = $model->Query_Key();
          while( $r = mysql_fetch_array( $result ) )
          {
          $_SESSION['contextualizacao'] = $r[0];
          $_SESSION['bibliografia'] = $r[1];
          $_SESSION['metodologia'] = $r[2];
          $_SESSION['objetivo_especifico'] = $r[3];
          $_SESSION['objetivo_geral'] = $r[4];
          $_SESSION['justificativa'] = $r[5];
          $_SESSION['problematica'] = $r[6];
          $_SESSION['cod_proposta'] = $r[7];
          $_SESSION['integrantes'] = $r[8];
          $_SESSION['titulo_proposta'] = $r[9];
          $_SESSION['cod_materia'] = $r[10];
          $_SESSION['cod_grupo'] = $r[11];
          $_SESSION['cod_pesquisa'] = $r[12];
          $_SESSION['cod_udc_status_proposta'] = $r[13];

          }
          $_SESSION['option'] = "delete";
          header( "Location: ../view/propostaViewUpd.php" );
          break;
        }
      case 'query':
        {
          $model = new propostaDAO();
          $model->setcontextualizacao( $_REQUEST['contextualizacao'] );
          $model->setbibliografia( $_REQUEST['bibliografia'] );
          $model->setmetodologia( $_REQUEST['metodologia'] );
          $model->setobjetivo_especifico( $_REQUEST['objetivo_especifico'] );
          $model->setobjetivo_geral( $_REQUEST['objetivo_geral'] );
          $model->setjustificativa( $_REQUEST['justificativa'] );
          $model->setproblematica( $_REQUEST['problematica'] );
          $model->setcod_proposta( $_REQUEST['cod_proposta'] );
          $model->setintegrantes( $_REQUEST['integrantes'] );
          $model->settitulo_proposta( $_REQUEST['titulo_proposta'] );
          $model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setcod_grupo( $_REQUEST['cod_grupo'] );
          $model->setcod_pesquisa( $_REQUEST['cod_pesquisa'] );
          $model->setcod_udc_status_proposta( $_REQUEST['cod_udc_status_proposta'] );

          $result = $model->Query_Key();
          while( $r = mysql_fetch_array( $result ) )
          {
          $_SESSION['contextualizacao'] = $r[0];
          $_SESSION['bibliografia'] = $r[1];
          $_SESSION['metodologia'] = $r[2];
          $_SESSION['objetivo_especifico'] = $r[3];
          $_SESSION['objetivo_geral'] = $r[4];
          $_SESSION['justificativa'] = $r[5];
          $_SESSION['problematica'] = $r[6];
          $_SESSION['cod_proposta'] = $r[7];
          $_SESSION['integrantes'] = $r[8];
          $_SESSION['titulo_proposta'] = $r[9];
          $_SESSION['cod_materia'] = $r[10];
          $_SESSION['cod_grupo'] = $r[11];
          $_SESSION['cod_pesquisa'] = $r[12];
          $_SESSION['cod_udc_status_proposta'] = $r[13];

          }
          $_SESSION['option'] = "query";
          header( "Location: ../view/propostaViewUpd.php" );
          break;
        }
      case 'open':
        {
          $model = new propostaDAO();
          $model->setcontextualizacao( $_REQUEST['contextualizacao'] );
          $model->setbibliografia( $_REQUEST['bibliografia'] );
          $model->setmetodologia( $_REQUEST['metodologia'] );
          $model->setobjetivo_especifico( $_REQUEST['objetivo_especifico'] );
          $model->setobjetivo_geral( $_REQUEST['objetivo_geral'] );
          $model->setjustificativa( $_REQUEST['justificativa'] );
          $model->setproblematica( $_REQUEST['problematica'] );
          $model->setcod_proposta( $_REQUEST['cod_proposta'] );
          $model->setintegrantes( $_REQUEST['integrantes'] );
          $model->settitulo_proposta( $_REQUEST['titulo_proposta'] );
          $model->setcod_materia( $_REQUEST['cod_materia'] );
          $model->setcod_grupo( $_REQUEST['cod_grupo'] );
          $model->setcod_pesquisa( $_REQUEST['cod_pesquisa'] );
          $model->setcod_udc_status_proposta( $_REQUEST['cod_udc_status_proposta'] );

          $result = $model->Query_Key();
          while( $r = mysql_fetch_array( $result ) )
          {
          $_SESSION['contextualizacao'] = $r[0];
          $_SESSION['bibliografia'] = $r[1];
          $_SESSION['metodologia'] = $r[2];
          $_SESSION['objetivo_especifico'] = $r[3];
          $_SESSION['objetivo_geral'] = $r[4];
          $_SESSION['justificativa'] = $r[5];
          $_SESSION['problematica'] = $r[6];
          $_SESSION['cod_proposta'] = $r[7];
          $_SESSION['integrantes'] = $r[8];
          $_SESSION['titulo_proposta'] = $r[9];
          $_SESSION['cod_materia'] = $r[10];
          $_SESSION['cod_grupo'] = $r[11];
          $_SESSION['cod_pesquisa'] = $r[12];
          $_SESSION['cod_udc_status_proposta'] = $r[13];

          }
          $_SESSION['option'] = "update";
          header( "Location: ../view/propostaViewUpd.php" );
          break;
        }
    }
  }
  /*
   * Function to return a resultset to view with all records 
   */
  function Query_Everyone()
  {
    $model = new propostaDAO();
    $result = $model->Query_All();
    return $result;
  }
  /*
   * Function to return a resultset to view 
   */
  function Query_Result()
  {
    $model = new propostaDAO();
          $model->setcontextualizacao( $_SESSION['contextualizacao'] );
          $model->setbibliografia( $_SESSION['bibliografia'] );
          $model->setmetodologia( $_SESSION['metodologia'] );
          $model->setobjetivo_especifico( $_SESSION['objetivo_especifico'] );
          $model->setobjetivo_geral( $_SESSION['objetivo_geral'] );
          $model->setjustificativa( $_SESSION['justificativa'] );
          $model->setproblematica( $_SESSION['problematica'] );
          $model->setcod_proposta( $_SESSION['cod_proposta'] );
          $model->setintegrantes( $_SESSION['integrantes'] );
          $model->settitulo_proposta( $_SESSION['titulo_proposta'] );
          $model->setcod_materia( $_SESSION['cod_materia'] );
          $model->setcod_grupo( $_SESSION['cod_grupo'] );
          $model->setcod_pesquisa( $_SESSION['cod_pesquisa'] );
          $model->setcod_udc_status_proposta( $_SESSION['cod_udc_status_proposta'] );

    $result = $model->Query_Filter();
    return $result;
  }
  /*
   * Function to return a resultset to populate a combo (select) 
   */
  function Query_Combo_Result( $fields )
  {
    $model = new propostaDAO();
    $result = $model->Query_Combo( $fields );
    return $result;
  }
  
  function Combogrupo($filter)
  {
    $sql = "select ".$filter." from grupo";
    $result = mysql_query( $sql );
    return $result;
  }
  
  function Combomateria($filter)
  {
    $sql = "select ".$filter." from materia";
    $result = mysql_query( $sql );
    return $result;
  }
  
  function Combopesquisa($filter)
  {
    $sql = "select ".$filter." from tipo_pesquisa";
    $result = mysql_query( $sql );
    return $result;
  }
  
  function ComboStatus($filter)
  {
    $sql = "select u.".$filter." from udc u where u.sistema = 'SGTCC' and u.tipo_codigo = 'PROSTATUS'";
    $result = mysql_query( $sql );
    return $result;
  }
}
$control = new propostaControl();
?>
