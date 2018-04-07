<!DOCTYPE html><body>
<?php  
       $servername = "localhost";  
       $username = "root";  
       $password = "";  
       $conn = mysql_connect ($servername , $username , $password) ;  
       $sql = mysql_select_db ('spardha18',$conn) ; 
	 
?>
<?php
// define variables and set to empty values
$name = $email = $mobno = $ns = $sa = $state = $pword = $pword2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $mobno = test_input($_POST["mobno"]);
  $ns = test_input($_POST["ns"]);
  $sa = test_input($_POST["sa"]);
  $state = test_input($_POST["state"]);
  $pword = test_input($_POST["pword"]);
  $pword2 = test_input($_POST["pword2"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
if($pword==$pword2)
{
	$pword1 = md5($pword);
	$sql3 = "INSERT INTO Teacher (Name,email,mobno,school,sa,state,pass) VALUES ('$name', '$email', '$mobno','$ns','$sa','$state','$pword1')";
 
  if (mysql_query($sql3,$conn) === TRUE)
  {
	
		$message="Thank You for registering. Kindly proceed to Log-in.";
		echo "<script type='text/javascript'>;alert('$message');window.location.href='login.php';</script>";
  }
 else{
	 if(mysql_errno($conn)== 1062) {
				  echo  "<script type='text/javascript'>alert('E-mail address is already registered')
				window.location = 'signup.html'; </script>";
				
			 }
			 else{
 die('Error:');}	
}
mysql_close($conn);}
?>
</body></html>
