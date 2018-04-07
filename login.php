<?php
@ob_start();
session_start();
if(isset($_SESSION['validuser'])&& $_SESSION['validuser']==true)
$_SESSION['location']="location: dashboard.php";
if(isset($_SESSION['location']))	
header($_SESSION['location']);
?><!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<title> Log In | Spardha'18 | Alma Fiesta'18</title>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="icon" href="almalogo.png?" type="image/x-icon">
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

@import "compass/css3";

$body-bg: #c1bdba;
$form-bg: #13232f;
$white: #ffffff;

$main: #1ab188;
$main-light: lighten($main,5%);
$main-dark: darken($main,5%);

$gray-light: #a0b3b0;
$gray: #ddd;

$thin: 300;
$normal: 400;
$bold: 600;
$br: 4px;

*, *:before, *:after {
  box-sizing: border-box;
}

html {
	overflow-y: scroll; 
}

body {
  background: #c1bdba;
  font-family: 'Titillium Web', sans-serif;
}

.placeholder #tab-content label {
  display: none;
}
 .no-placeholder #tab-content label{
margin-left:5px;
  position:relative;
  display:block;
  color:grey;
  text-shadow:0 1px white;
  font-weight:bold;
}

a {
  text-decoration:none;
  color: #1ab188;
  transition:.5s ease;
}

a:hover {
    color:#ffBA8F;
  }

.form {
  background:rgba(19, 35, 47, 0.7);
  padding: 40px;
  max-width:600px;
  margin:40px auto;
  border-radius:10px;
  box-shadow:0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.tab-group {
  list-style:none;
  padding:0;
  margin:0 0 40px 0;
  
  li a {
    display: inline-block;
    text-decoration:none;
    padding:15px;
    background:rgba(160, 179, 176 , 0.25);
    color:#a0b3b0;
    font-size:20px;
    float:left;
    text-align:center;
    cursor:pointer;
    transition:.5s ease;
    a:hover {
      background:#1BBA8F;
      color:#ffffff;
    }
  }
  a:active {
    background:#1ab188;
    color:#ffffff;
  }
}
.tab-group li a {
    display:inline-block;
    text-decoration:none;
    padding:15px;
    background:#1ab188;
    color:#ffBA8F;
    font-size:20px;
    width:50%;
    float: center;
    text-align:center;
    cursor:pointer;
    transition:.5s ease; 
}

.tab-group li a:hover{
  background:#ffBA8F;
  color:#ffffff;  
}

/*
.tab-group li a:active{
  background:#1ab188;
    color:#ffffff;
}

.tab-group::after {
    content: "";
    display: table;
    clear: both;
  }
*/
.tab-content > div:last-child {
  display:none;
}

h1 {
  text-align:center;
  color:#ffffff;
  font-weight:300;
  margin:0 0 40px;
}

label {
  position:absolute;
  transform:translateY(6px);
  left:13px;
  color:#ffffff;
  transition:all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size:22px;
  .req {
  	margin:2px;
  	color:#1ab188;
  }
}

label.active {
  transform:translateY(50px);
  left:2px;
  font-size:14px;
  .req {
    opacity:0;
  }
}

label.highlight {
	color:#ffffff;
}

textarea {
  font-size:22px;
  display:block;
  width:100%;
  height:100%;
  padding:5px 10px;
  background:none;
  background-image:none;
  border:1px solid #a0b3b0;
  color:#ffffff;
  border-radius:0;
  transition:border-color .25s ease, box-shadow .25s ease;
  &i:focus {
		outline:0;
		border-color:#1ab188;
  }
}

input{
  font-size:22px;
  display:block;
  width:100%;
  height:100%;
  padding:5px 10px;
  background:none;
  background-image:none;
  border:1px solid #a0b3b0;
  color:#1ab188;
  border-radius:0;
  transition:border-color .25s ease, box-shadow .25s ease;
  &i:focus {
    outline:0;
    border-color:#1ab188;
  }
}

textarea {
  border:2px solid #a0b3b0;
  resize: vertical;
}

.field-wrap {
  position:relative;
  margin-bottom:40px;
}

.top-row {
  &:after {
    content: "";
    display: table;
    clear: both;
  }

  > div {
    float:left;
    width:48%;
    margin-right:4%;
    &:last-child { 
      margin:0;
    }
  }
}

.button {
  border:0;
  outline:none;
  border-radius:10px;
  padding:15px 0;
  font-size:2rem;
  font-weight:600;
  text-transform:uppercase;
  letter-spacing: 0.1em;
  background:#1ab188;
  color:#ffffff;
  transition:all.5s ease;
  -webkit-appearance: none;
}

.button :hover, .button:focus {
    background:#1BBA8F;
  }



.signuplink {
  margin-top:-20px;
  text-align:right;
  color:#ffBA8F;
}

.column: {
  float: left;
  width:33%;
  padding: 15px;
  height: 150px;
}

.row:after{
  content: "";
  display: table;
  clear:both;
}
</style>
</head>
<script>$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});</script>

<body>
<?php  
        $servername = "localhost";  
       $username = "root";  
       $password = "";    
       $conn = mysql_connect ($servername , $username , $password) ;  
       $sql = mysql_select_db ('spardha18',$conn); 
	  

$email = $pword= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
  $pword = test_input($_POST["pword"]);
 
$pword1 = md5($pword);
 
  $sql = mysql_query("SELECT * FROM Teacher WHERE email='$email' AND pass='$pword1'");
 $count = mysql_num_rows($sql);

if ($count == 1){
  $row = mysql_fetch_array($sql) ;
 
 
  if(!empty($row['email']) AND !empty($row['pass']))
  {
	$_SESSION['email']= $row['email'];
	$_SESSION['validuser']=true;
			$_SESSION['location']="location: dashboard.php";	
			if(isset($_SESSION['location']))	
			header($_SESSION['location']);
			ob_end_flush();
		 echo "<script type='text/javascript'>
		 window.location.href='dashboard.php';</script>";
	  
  } 
 
  }else {
	$query1 = mysql_query("SELECT * FROM Teacher where email='$email'");
$count1 = mysql_num_rows($query1);
if ($count1 == 1){
		echo "<script type='text/javascript'>alert('Incorrect password ')
			window.location = 'login.php'; </script>";
}else{
	echo "<script type='text/javascript'>alert('E-mail address is not registered')
window.location = 'login.php'; </script>";

}
}
 
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
  <div class="form">
	<div id="login">   
          <h1>Welcome Back!</h1>
          
          <form class = "loginform" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
          
            <div class="field-wrap"><label>Email-Id*:</label><br><br>
            <label><span class="req"></span>
            </label>
            <input type="email" required autocomplete="on" name="email"/>
            </div>
          
            <div class="field-wrap"><label>Password*:</label><br><br>
            <label><span class="req"></span>
            </label>
            <input type="password" required autocomplete="off" minlength= "6" name="pword"/>
            </div>
			
           
          
            <button class="button button-block" style="padding-left:5px;padding-right=5px;">Log in</button>
           <p class="signuplink"> A new user? <a href="signup.html">Sign up</a> here</p><br>
		     <p class="signuplink"> Having trouble? <a href="index.html#cus">Contact Us</a></p>
		   <div></br>
 <div class="row">
  
   <div class="col-md-4 col-sm-4 col-lg-4" style="padding-left:60px;"><a href="https://www.facebook.com/almafiesta/?ref=br_rs">
     <i class="fa fa-facebook fa-4x "></i></a></div>
   <div class="col-md-4 col-sm-4 col-lg-4">
      <a href="https://www.instagram.com/almafiesta.iitbbs/"><i class="fa fa-instagram fa-4x" style="padding-left:50px;"></i></a></div>
   <div class="col-md-4 col-sm-4 col-lg-4">
      <a href="https://www.youtube.com/channel/UCVAHFAfxXx0ZaOyS5VczKiA"><i class="fa fa-youtube fa-4x"style="padding-left:50px; "></i></a></div></div>
   <div class= "row"><strong></br>
     <a href="http://2017.almafiesta.com/">Almafiesta </a> © Copyright 2018, All Rights Reserved |Web Development Team|</strong></div>
 </div>
          </form>

  </div><!--login-->
  </div>

        <br><br><br>



</body></html>
