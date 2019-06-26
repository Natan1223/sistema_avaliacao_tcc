
<?php 
class ConnectionBD { 
  var $con;
  //** Constructor to open connection 
  function ConnectionBD()
  {
	   $this->con = mysql_connect( "localhost","root","root");
	   if( !$this->con )
	   {
		   echo("Error trying to connect to database.");
		   exit;
		 }
	   mysql_select_db( "tcchugos_sistema_tcc" , $this->con );
	 }
	 //** Close connection function 
	 function CloseBd()
	 {
	   mysql_close( $this->con );
  }
}
?>
