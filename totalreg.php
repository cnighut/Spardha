<?php 
session_start();

$host="localhost";
$user="root";
$password="";

define('DB_NAME',"spardha18");

$con= mysql_connect($host,$user,$password);
$db= mysql_select_db(DB_NAME,$con);

if($con  ){
	
}
else{
echo "Not Connected";
}

 $query3 = mysql_query("SELECT * FROM sinfo WHERE email= '".$_SESSION['email']."'");
				$row_2 = mysql_fetch_array($query3);
				if(!empty($row_2['email'])){
					
					$_SESSION["totalreg"]= mysql_num_rows($query3) ;
					
				echo $_SESSION["totalreg"];
				
				}
				else {
					$_SESSION["totalreg"] = 0;
					echo $_SESSION["totalreg"];
				}
 


?>
