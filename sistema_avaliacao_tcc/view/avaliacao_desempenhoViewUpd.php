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
      <?php 
        if ( $_SESSION['option'] == "delete" OR $_SESSION['option'] == "query" )
        {
          $readonly = "readonly";
        }
        else
        {
          $readonly = "";
        }
      ?>
      <?php 
        switch( $_SESSION['option'] )
        {
          case 'insert':
            {
              $label = "Insert";
              break;
            }
          case 'update':
            {
              $label = "Update";
              break;
            }
          case 'delete':
            {
              $label = "Delete";
              break;
            }
          case 'query':
            {
              $label = "Query";
              break;
            }
        }
      ?>
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
              <a href="avaliacao_desempenhoViewCon.php">Avaliação de Desempenho</a>
            </li>
            <li class="active">Cadastrar Avaliação de Desempenho</li>
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
          <div class="page-header">
            <h1>
              Cadastrar Avaliação de Desempenho
              <small>
                <i class="icon-double-angle-right"></i>
                  <?php echo( $label ); ?> Avaliação de Desempenho
              </small>
            </h1>
          </div><!-- /.page-header -->
          <div class="row">
            <div class="col-xs-12">
  
              <form class="form-horizontal" role="form" method="post" action="../control/avaliacao_desempenhoControl.php">
                <input type="hidden" name="option" value="<?php echo( $_SESSION['option'] ); ?>" />
                <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="cod_avaliacao">Código Avaliação de Desempenho</label>
                    <!-- Here you can add a tag readonly="" do make the input readonly-->
                  <div class="col-sm-9">
                    <input readonly="true" <?php echo($readonly); ?> value="<?php echo( $_SESSION['cod_avaliacao'] ); ?>" type="text" name="cod_avaliacao" id="cod_avaliacao" placeholder="Gerado pelo Sistema" class="col-xs-10 col-sm-5" />
                  </div>
                </div>
                <div class="space-4"></div>
                <div class="form-group">
                  <label class="col-sm-3 control-label no-padding-right" for="descricao_avaliacao">Descrição de Avaliação</label>
                    <!-- Here you can add a tag readonly="" do make the input readonly-->
                  <div class="col-sm-9">
                    <input <?php echo($readonly); ?> value="<?php echo( $_SESSION['descricao_avaliacao'] ); ?>" type="text" name="descricao_avaliacao" id="descricao_avaliacao" placeholder="Descrição de Avaliação" class="col-xs-10 col-sm-5" />
                  </div>
                </div>
                <div class="space-4"></div>
                <?php 
                  if ( $_SESSION['option'] != "query" )
                  { ?>
                    <div class="clearfix form-actions">
                      <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-sm btn-info" type="submit">
                          <i class="icon-ok bigger-110"></i>
                          Salvar
                        </button>
                        &nbsp; &nbsp; &nbsp;
                        <button class="btn btn-sm" type="reset">
                          <i class="icon-undo bigger-110"></i>
                          Limpar
                        </button>
                      </div>
                    </div>
                  <?php } ?>
              </form>
   
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
  <!--[if lte IE 8]>
    <script src="../js/excanvas.min.js"></script>
  <![endif]-->
  <script src="../js/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="../js/jquery.ui.touch-punch.min.js"></script>
  <script src="../js/chosen.jquery.min.js"></script>
  <script src="../js/fuelux/fuelux.spinner.min.js"></script>
  <script src="../js/date-time/bootstrap-datepicker.min.js"></script>
  <script src="../js/date-time/bootstrap-timepicker.min.js"></script>
  <script src="../js/date-time/moment.min.js"></script>
  <script src="../js/date-time/daterangepicker.min.js"></script>
  <script src="../js/bootstrap-colorpicker.min.js"></script>
  <script src="../js/jquery.knob.min.js"></script>
  <script src="../js/jquery.autosize.min.js"></script>
  <script src="../js/jquery.inputlimiter.1.3.1.min.js"></script>
  <script src="../js/jquery.maskedinput.min.js"></script>
  <script src="../js/bootstrap-tag.min.js"></script>
  <!-- inline scripts related to this page -->
  <script type="text/javascript">
    jQuery(function($) {
      $('#id-disable-check').on('click', function() {
        var inp = $('#form-input-readonly').get(0);
        if(inp.hasAttribute('disabled')) {
          inp.setAttribute('readonly' , 'true');
          inp.removeAttribute('disabled');
          inp.value="This text field is readonly!";
        }
        else {
          inp.setAttribute('disabled' , 'disabled');
          inp.removeAttribute('readonly');
          inp.value="This text field is disabled!";
        }
      });
  
      $(".chosen-select").chosen();
      $('#chosen-multiple-style').on('click', function(e){
        var target = $(e.target).find('input[type=radio]');
        var which = parseInt(target.val());
        if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
        else $('#form-field-select-4').removeClass('tag-input-style');
      });
  
      $('[data-rel=tooltip]').tooltip({container:'body'});
      $('[data-rel=popover]').popover({container:'body'});
      $('textarea[class*=autosize]').autosize({append: "\n"});
      $('textarea.limited').inputlimiter({
        remText: '%n character%s remaining...',
        limitText: 'max allowed : %n.'
      });
  
      $.mask.definitions['~']='[+-]';
      $('.input-mask-date').mask('99/99/9999');
      $('.input-mask-phone').mask('(99) 9999-9999');
      $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
      $(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
  
      $( "#input-size-slider" ).css('width','200px').slider({
        value:1,
        range: "min",
        min: 1,
        max: 8,
        step: 1,
        slide: function( event, ui ) {
          var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
          var val = parseInt(ui.value);
          $('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
        }
      });
  
      $( "#input-span-slider" ).slider({
        value:1,
        range: "min",
        min: 1,
        max: 12,
        step: 1,
        slide: function( event, ui ) {
          var val = parseInt(ui.value);
          $('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
        }
      });
  
      $( "#slider-range" ).css('height','200px').slider({
        orientation: "vertical",
        range: true,
        min: 0,
        max: 100,
        values: [ 17, 67 ],
        slide: function( event, ui ) {
          var val = ui.values[$(ui.handle).index()-1]+"";
          if(! ui.handle.firstChild ) {
            $(ui.handle).append("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>");
          }
          $(ui.handle.firstChild).show().children().eq(1).text(val);
        }
      }).find('a').on('blur', function(){
        $(this.firstChild).hide();
      });
  
      $( "#slider-range-max" ).slider({
        range: "max",
        min: 1,
        max: 10,
        value: 2
      });
  
      $( "#eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
        // read initial values from markup and remove that
        var value = parseInt( $( this ).text(), 10 );
        $( this ).empty().slider({
          value: value,
          range: "min",
          animate: true
        });
      });
  
      $('#id-input-file-1 , #id-input-file-2').ace_file_input({
        no_file:'No File ...',
        btn_choose:'Choose',
        btn_change:'Change',
        droppable:false,
        onchange:null,
        thumbnail:false //| true | large
        //whitelist:'gif|png|jpg|jpeg'
        //blacklist:'exe|php'
        //onchange:''
      });
  
      $('#id-input-file-3').ace_file_input({
        style:'well',
        btn_choose:'Drop files here or click to choose',
        btn_change:null,
        no_icon:'icon-cloud-upload',
        droppable:true,
        thumbnail:'small'//large | fit
        //,icon_remove:null//set null, to hide remove/reset button
        /**,before_change:function(files, dropped) {
          //Check an example below
          //or examples/file-upload.html
          return true;
        }*/
        /**,before_remove : function() {
          return true;
        }*/
        ,
        preview_error : function(filename, error_code) {
          //name of the file that failed
          //error_code values
          //1 = 'FILE_LOAD_FAILED',
          //2 = 'IMAGE_LOAD_FAILED',
          //3 = 'THUMBNAIL_FAILED'
          //alert(error_code);
        }
      }).on('change', function(){
        //console.log($(this).data('ace_input_files'));
        //console.log($(this).data('ace_input_method'));
      });
  
      //dynamically change allowed formats by changing before_change callback function
      $('#id-file-format').removeAttr('checked').on('change', function() {
        var before_change
        var btn_choose
        var no_icon
        if(this.checked) {
          btn_choose = "Drop images here or click to choose";
          no_icon = "icon-picture";
          before_change = function(files, dropped) {
            var allowed_files = [];
            for(var i = 0 ; i < files.length; i++) {
              var file = files[i];
              if(typeof file === "string") {
                //IE8 and browsers that dont support File Object
                if(! (/\.(jpe?g|png|gif|bmp)$/i).test(file) ) return false;
              }
              else {
                var type = $.trim(file.type);
                if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif|bmp)$/i).test(type) )
                      || ( type.length == 0 && ! (/\.(jpe?g|png|gif|bmp)$/i).test(file.name) )//for androids default browser which gives an empty string for file.type
                ) continue;//not an image so dont keep this file
              }
              allowed_files.push(file);
            }
            if(allowed_files.length == 0) return false;
            return allowed_files;
          }
        }
        else {
          btn_choose = "Drop files here or click to choose";
          no_icon = "icon-cloud-upload";
          before_change = function(files, dropped) {
            return files;
          }
        }
        var file_input = $('#id-input-file-3');
        file_input.ace_file_input('update_settings', {'before_change':before_change, 'btn_choose': btn_choose, 'no_icon':no_icon})
        file_input.ace_file_input('reset_input');
      });
  
      $('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
      .on('change', function(){
        //alert(this.value)
      });
      $('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'icon-caret-up', icon_down:'icon-caret-down'});
      $('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'icon-plus smaller-75', icon_down:'icon-minus smaller-75', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
  
      $('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
        $(this).prev().focus();
      });
      $('input[name=date-range-picker]').daterangepicker().prev().on(ace.click_event, function(){
        $(this).next().focus();
      });
      $('#timepicker1').timepicker({
        minuteStep: 1,
        showSeconds: true,
        showMeridian: false
      }).next().on(ace.click_event, function(){
        $(this).prev().focus();
      });
      $('#colorpicker1').colorpicker();
      $('#simple-colorpicker-1').ace_colorpicker();
  
      $(".knob").knob();
  
      // we could just set the data-provide="tag" of the element inside HTML, but IE8 fails!
      var tag_input = $('#form-field-tags');
      if(! ( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase())) )
      {
        tag_input.tag(
          {
            placeholder:tag_input.attr('placeholder'),
            // enable typeahead by specifying the source array
            source: ace.variable_US_STATES,//defined in ace.js >> ace.enable_search_ahead
          }
        );
      }
      else {
        // display a textarea for old IE, because it doesnt support this plugin or another one I tried!
        tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
        //$('#form-field-tags').autosize({append: "\n"});
      }
  
      $('#modal-form input[type=file]').ace_file_input({
        style:'well',
        btn_choose:'Drop files here or click to choose',
        btn_change:null,
        no_icon:'icon-cloud-upload',
        droppable:true,
        thumbnail:'large'
      })
  
      // chosen plugin inside a modal will have a zero width because the select element is originally hidden
      // and its width cannot be determined.
      // so we set the width after modal is show
      $('#modal-form').on('shown.bs.modal', function () {
        $(this).find('.chosen-container').each(function(){
          $(this).find('a:first-child').css('width' , '210px');
          $(this).find('.chosen-drop').css('width' , '210px');
          $(this).find('.chosen-search input').css('width' , '200px');
        });
      })
  
      /**
      // or you can activate the chosen plugin after modal is shown
      // this way select element becomes visible with dimensions and chosen works as expected
      $('#modal-form').on('shown', function () {
        $(this).find('.modal-chosen').chosen();
      })
      */
    });
  </script>
</body>
</html>
