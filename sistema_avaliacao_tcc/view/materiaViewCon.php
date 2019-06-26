<!DOCTYPE html> 
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="Natã dos Santos Bandeira">
   <title>SISTEMA DE GERÊNCIAMENTO DE TCC</title>
   <!-- basic styles -->
   <link href="../css/bootstrap.min.css" rel="stylesheet" />
   <link href="../css/jquery.dataTables.css" rel="stylesheet" />
   <link href="../css/dataTables.tableTools.css" rel="stylesheet" />
   <link rel="stylesheet" href="../css/font-awesome.min.css" />
   <!--[if IE 7]>
   <link rel="stylesheet" href="../css/font-awesome-ie7.min.css" />
   <![endif]-->
   <!-- page specific plugin styles -->
   <!-- fonts -->
   <link rel="stylesheet" href="../css/ace-fonts.css" />
   <!-- ace styles -->
   <link rel="stylesheet" href="../css/ace.min.css" />
   <link rel="stylesheet" href="../css/ace-rtl.min.css" />
   <link rel="stylesheet" href="../css/ace-skins.min.css" />
   <!--[if lte IE 8]>
   <link rel="stylesheet" href="../css/ace-ie.min.css" />
   <![endif]-->
   <!-- inline styles related to this page -->
   <!-- ace settings handler -->
   <script src="../js/ace-extra.min.js"></script>
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="../js/html5shiv.js"></script>
   <script src="../js/respond.min.js"></script>
   <![endif]-->
</head>
<body>
<?php session_start(); 
  include_once ("../validausuario.php");
	include_once ("topnav.php"); ?>
  
  <div class="main-container" id="main-container">
    <script type="text/javascript">
      try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>
  
    <div class="main-container-inner">
  
      <a class="menu-toggler" id="menu-toggler" href="#">
        <span class="menu-text"></span>
      </a>
      <?php include_once ("leftmenu.php"); ?>
<script type="text/javascript">
  function changerecord( aux )
  {
    changeform.option.value = "open";
    changeform.cod_materia.value = aux;
    changeform.submit();
  }
</script>
<script type="text/javascript">
  function deleterecord( aux )
  {
    changeform.option.value = "remove";
    changeform.cod_materia.value = aux;
    changeform.submit();
  }
</script>
<script type="text/javascript">
  function queryrecord( aux )
  {
    changeform.option.value = "query";
    changeform.cod_materia.value = aux;
    changeform.submit();
  }
</script>
<script type="text/javascript">
  function addrecord( )
  {
    changeform.option.value = "add";
    changeform.submit();
  }
</script>
<form action="../control/materiaControl.php" name="changeform" method="post">
  <input type="hidden" name="option" value="" />
    <input type="hidden" name="cod_materia" value="" />
</form>
      <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
          <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
          </script>
          <ul class="breadcrumb">
            <li>
              <i class="icon-home home-icon"></i>
              <a href="../index.php">Home</a>
            </li>
            <li>
              <a href="#">Options</a>
            </li>
            <li class="active">materia</li>
          </ul><!-- .breadcrumb -->
          <div class="nav-search" id="nav-search">
            <form class="form-search">
              <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                <i class="icon-search nav-search-icon"></i>
              </span>
            </form>
          </div><!-- #nav-search -->
        </div><!--breadcrumbs-->
        <div class="page-content">
          <div class="row">
            <div class="col-xs-12">
  
              <div class="row">
                <div class="col-xs-12">
                  <h3 class="header smaller lighter blue">Matéria</h3>
                  <p>
                    <button class="btn btn-sm btn-primary" onClick="javascript:addrecord();">Nova Matéria</button>
                  </p>
                  <div class="table-header">
                    Matérias Cadastradas:
                  </div>
                  <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th class="center" width=15>
                            <label>
                              <input type="checkbox" class="ace" />
                              <span class="lbl"></span>
                            </label>
                          </th>
                          <th class="hidden-480">
                            Codigo Matéria
                          </th>
                          <th>
                            Desceição Matéria
                          </th>
                          <th width=100></th>
                        </tr>
                      </thead>
                      <tbody>
<?php 
include_once ("../control/materiaControl.php");
$control = new materiaControl();
$result = $control->Query_Everyone();
if( mysql_num_rows( $result ) > 0 )
{
  while( $r = mysql_fetch_array( $result ) )
  {
    echo( "<tr>" );
    echo( "  <td class='center'>" );
    echo( "    <label>" );
    echo( "      <input type='checkbox' class='ace' />" );
    echo( "      <span class='lbl'></span>" );
    echo( "    </label>" );
    echo( "  </td>" );
    echo( "  <td class='hidden-480'>" );
      echo("<a href=javascript:changerecord('".$r[0]."');>".$r[0]."</a>");
    echo( "  <td>" );
      echo($r[1]);
// If you want to add a label with a text message, insert do code below-->
// <span class="label label-sm label-warning">Expiring</span> -->
    echo( "  <td>" );
    echo( "    <div class='visible-md visible-lg hidden-sm hidden-xs action-buttons'>" );
    echo( "      <a class='blue' href=javascript:queryrecord('".$r[0]."');>" );
    echo( "        <i class='icon-zoom-in bigger-130'></i>" );
    echo( "      </a>" );
    echo( "      <a class='green' href=javascript:changerecord('".$r[0]."');>" );
    echo( "        <i class='icon-pencil bigger-130'></i>" );
    echo( "      </a>" );
    echo( "      <a class='red' href=javascript:deleterecord('".$r[0]."');>" );
    echo( "        <i class='icon-trash bigger-130'></i>" );
    echo( "      </a>" );
    echo( "    </div>" );
    echo( "    <div class='visible-xs visible-sm hidden-md hidden-lg'>" );
    echo( "      <div class='inline position-relative'>" );
    echo( "        <button class='btn btn-minier btn-yellow dropdown-toggle' data-toggle='dropdown'>" );
    echo( "          <i class='icon-caret-down icon-only bigger-120'></i>" );
    echo( "        </button>" );
    echo( "        <ul class='dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close'>" );
    echo( "          <li>" );
    echo( "            <a href=javascript:queryrecord('".$r[0]."'); class='tooltip-info' data-rel='tooltip' title='View'>" );
    echo( "              <span class='blue'>" );
    echo( "                <i class='icon-zoom-in bigger-120'></i>" );
    echo( "              </span>" );
    echo( "            </a>" );
    echo( "          </li>" );
    echo( "          <li>" );
    echo( "            <a href=javascript:changerecord('".$r[0]."'); class='tooltip-success' data-rel='tooltip' title='Edit'>" );
    echo( "              <span class='green'>" );
    echo( "                <i class='icon-edit bigger-120'></i>" );
    echo( "              </span>" );
    echo( "            </a>" );
    echo( "          </li>" );
    echo( "          <li>" );
    echo( "            <a href=javascript:deleterecord('".$r[0]."'); class='tooltip-error' data-rel='tooltip' title='Delete'>" );
    echo( "              <span class='red'>" );
    echo( "                <i class='icon-trash bigger-120'></i>" );
    echo( "              </span>" );
    echo( "            </a>" );
    echo( "          </li>" );
    echo( "        </ul>" );
    echo( "      </div>" );
    echo( "    </div>" );
    echo( "  </td>" );
    echo( "</tr>" );
  }
}
?>
                      </tbody>
                    </table><!--data-table-->
                  </div><!--table-responsive-->
                </div><!--col-xs-12-->
              </div><!--row-->
   
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->
    
    </div><!-- /.main-container-inner -->
    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
      <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
  </div><!-- /.main-container -->
  
  <!-- basic scripts -->
  
  <!--[if !IE]> -->
    <script type="text/javascript">
      window.jQuery || document.write("<script src='../js/jquery-2.0.3.min.js'>"+"<"+"/script>");
    </script>
  <!-- <![endif]-->
  
  <!--[if IE]>
    <script type="text/javascript">
      window.jQuery || document.write("<script src='../js/jquery-1.10.2.min.js'>"+"<"+"/script>");
    </script>
  <![endif]-->
  
  <script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='../js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
  </script>
  
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/typeahead-bs2.min.js"></script>
  
  <!-- ace scripts -->
  <script src="../js/ace-elements.min.js"></script>
  <script src="../js/ace.min.js"></script>
  
  <!-- page specific plugin scripts -->
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/jquery.dataTables.bootstrap.js"></script>
  <script src="../js/dataTables.tableTools.js"></script>
  
  <!-- inline scripts related to this page -->
  
  <script type="text/javascript">
    jQuery(function($) {
      var oTable1 = $('#data-table').dataTable( { 
        "iDisplayLength": 20,
        "dom": 'T<"clear">lfrtip', 
        "tableTools": { 
          "sSwfPath": "../swf/copy_csv_xls_pdf.swf" 
                      }, 
        "aoColumns": [
          { "bSortable": false }, 
          null,null,
          { "bSortable": false }
                     ] } );
  
      $('table th input:checkbox').on('click' , function(){ 
        var that = this;
        $(this).closest('table').find('tr > td:first-child input:checkbox') 
        .each(function(){
          this.checked = that.checked;
          $(this).closest('tr').toggleClass('selected'); 
        });
      });
  
      $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
      function tooltip_placement(context, source) {
        var $source = $(source);
        var $parent = $source.closest('table')
        var off1 = $parent.offset();
        var w1 = $parent.width();
        var off2 = $source.offset();
        var w2 = $source.width();
        if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
        return 'left';
      }
    })
  </script>
</body>
</html>
