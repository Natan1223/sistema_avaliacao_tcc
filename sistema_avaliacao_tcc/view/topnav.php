<?php
  include('../utils_date.php');
?>

<style>
.city {
   float: left;
   margin: 5px;
   padding: 5px;
   border: 1px solid white;
}
</style>
<div class="navbar navbar-fixed" id="navbar">
    <script type="text/javascript">
      try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>
  <div class="navbar-container" id="navbar-container">
    <div class="navbar-header pull-rigt">
      <a href="../index.php" class="navbar-brand">
        <small>
        	<img src="../imagens_projeto/logo.png" width="80%">
            <!-- <i class="icon-gears"> SISTEMA DE GERENCIAMENTO DE TCC </i>  -->
            
        </small>
      </a><!-- /.brand -->
    </div><!-- /.navbar-header -->
    <div class="navbar-header pull-right city" role="navigation">	
     	<font color="white">
          Usuário Logado: <?php echo $_SESSION['nome']; ?><br>
          <?php 
            echo date_formated()."<br>";
            echo "Horário: <i>".date("H:i:s")."</i>";
          ?>
        </font>
    </div><!-- /.navbar-header -->
  </div><!-- /.container -->
</div><!-- navbar-->