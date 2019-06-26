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
  //include_once ("../validausuario.php");
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
    changeform.cod_proposta.value = aux;
    changeform.submit();
  }
</script>
<script type="text/javascript">
  function deleterecord( aux )
  {
    changeform.option.value = "remove";
    changeform.cod_proposta.value = aux;
    changeform.submit();
  }
</script>
<script type="text/javascript">
  function queryrecord( aux )
  {
    changeform.option.value = "query";
    changeform.cod_proposta.value = aux;
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
<form action="../control/propostaControl.php" name="changeform" method="post">
  <input type="hidden" name="option" value="" />
    <input type="hidden" name="cod_proposta" value="" />
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
            <li class="active">proposta</li>
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
                  <h3 class="header smaller lighter blue">Proposta</h3>
                  <p>
                    <button class="btn btn-sm btn-primary" onClick="javascript:addrecord();">Nova Proposta</button>
                  </p>
                  <div class="table-header">
                    Propostas Cadastradas:
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
                            contextualizacao
                          </th>
                          <th>
                            bibliografia
                          </th>
                          <th>
                            metodologia
                          </th>
                          <th>
                            objetivo_especifico
                          </th>
                          <th>
                            objetivo_geral
                          </th>
                          <th>
                            justificativa
                          </th>
                          <th width=100></th>
                        </tr>
                      </thead>
                      <tbody>
<?php 
include_once ("../control/propostaControl.php");
$control = new propostaControl();
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
      echo($r[0]);
    echo( "  <td>" );
      echo($r[1]);
    echo( "  <td>" );
      echo($r[2]);
    echo( "  <td>" );
      echo($r[3]);
    echo( "  <td>" );
      echo($r[4]);
    echo( "  <td>" );
      echo($r[5]);
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
      <div class="ace-settings-container" id="ace-settings-container">
        <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
          <i class="icon-cog bigger-150"></i>
        </div>
        <div class="ace-settings-box" id="ace-settings-box">
          <div>
            <div class="pull-left">
              <select id="skin-colorpicker" class="hide">
                <option data-skin="default" value="#438EB9">#438EB9</option>
                <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
              </select>
            </div>
            <span>&nbsp; Choose Skin</span>
          </div>
          <div>
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
          </div>
          <div>
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
          </div>
          <div>
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
          </div>
          <div>
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
          </div>
          <div>
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
            <label class="lbl" for="ace-settings-add-container">
              Inside <b>.container</b>
            </label>
          </div>
        </div><!--ace-setting-box-->
      </div><!-- /#ace-settings-container -->
  
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
          null,null,null,null,null,null,
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
