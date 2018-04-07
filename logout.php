<?php
ob_start();
session_start();
?>

<?php 
				/* Log Out*/
                                
error_reporting(E_ALL ^ E_DEPRECATED);
session_destroy();
header("Location: login.php" );
ob_end_flush();

?>