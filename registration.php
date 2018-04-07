<?php
session_start();
if(!$_SESSION['validuser']){
header("location: login.php");}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">
<link rel="icon" href="almalogo.png?" type="image/x-icon">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/yellow.css">
  

  
  <script>
	
 $(document).ready(function(){
 
                    function totalreg(){
                      $.ajax({
                        type:"post",
                        url:"totalreg.php",
                        data:"text",
                        success:function(data){
                             $("#totalreg1").html(data);
							  
							  
                        }
                      });
                    }
 totalreg();


 });
	</script>
</head>
<body>

<?php
if(isset($_POST["submit"]))
{
	

$host="localhost";
$user="root";
$password="";

$con= mysql_connect($host,$user,$password);
define('DB_NAME',"spardha18");

if($con  ){
	
}
else{
echo "Not Connected";
}

$db= mysql_select_db(DB_NAME,$con);

$rows = $_POST["count"];



$f=false;
 for($i=0;$i<$rows;$i=$i+1)
	{
		
		$sname[$i]=$class[$i]="";
		$str = "sname".$i;
		$str1 = "class".$i;
		
		$sname[$i] = $_POST[$str];
		$class[$i] = $_POST[$str1];
		$a='';
		$sno = "select MAX(id) from sinfo";

$result1 = mysql_query($sno);
$value1 = mysql_fetch_array($result1);
$val1 = $value1[0];

if($val1==NULL)
 $val1= $val1+1;
else 
 $val1 = $val1+1;
		if($class[$i]=="VI"||$class[$i]=="VII"||$class[$i]=="VIII")
		{$a = 'A';}
		elseif($class[$i]=="IX"||$class[$i]=="X")
		{$a = 'B';
		}
			else
			{$a ='C';
			}
		if($val1 <= 99)
		$rollno = 'AF18SP'.$a.'00'.$val1 ;
		
		else{
			$rollno = 'AF18SP'.$a.'0'.$val1 ; 
		}
		
	 
		$val = $_SESSION['email'];
		 mysql_query("INSERT INTO sinfo VALUES('','$rollno','$val','$sname[$i]','$class[$i]')")or die(mysql_error());
		 $f=true;
		 

	}
	
	
		if($f==true){
			
	 
	 echo  "<script type='text/javascript'>alert('All the values were saved successfully')
 window.location = 'registered.php';

 </script>";
 
		
	
	}
	  }?>






  <div class="app app-default">
<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="index.html" target="_blank"><span class="highlight">SPARDHA'18</span>User</a>
	
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li class="">
        <a href="dashboard.php">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>
      <li class="active">
        <a href="registration.php">
          <div class="icon">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
          </div>
          <div class="title">Register</div>
        </a>
      </li>
      <li class=" ">
        <a href="registered.php" >
          <div class="icon">
            <i class="fa fa-registered" aria-hidden="true"></i>
          </div>
          <div class="title">Registered</div>
        </a>
        <div class="dropdown-menu">
         
        </div>
      </li>
     
    </ul>
  </div>
  <div class="sidebar-footer">
    <ul class="menu">
      <li>
        <a href="index.html" target="_blank" >
        
          <i class="fa fa-home fa-2x" title="Home" aria-hidden="true"></i>
		  
        </a>
      </li>
      <li><a href="logout.php"> <i class="fa fa-sign-out fa-2x" title="Log out" aria-hidden="true"></i></a></li>

    </ul>
  </div>
</aside>

<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>

</script>
<div class="app-container">
  <nav class="navbar navbar-default" id="navbar">
  <div class="container-fluid">
    <div class="navbar-collapse collapse in">
      <ul class="nav navbar-nav navbar-mobile">
        <li>
          <button type="button" class="sidebar-toggle">
            <i class="fa fa-bars"></i>
          </button>
        </li>
        <li class="logo">
          <a class="navbar-brand" href="index.html" target="_blank"><span class="highlight">Spardha'18</span> User</a>
        </li>
        <li>
          <button type="button" class="navbar-toggle">
            <img class="profile-img" src="assets/images/profile.png">
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <li class="navbar-title">New Registration</li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
       
      
        <li class="dropdown notification danger">
          <a href="registered.php" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-check" aria-hidden="true"></i></div>
            <div class="title">Total Registrations</div>
           <div class="count" ><span  id="totalreg1"></span></div>
          </a>
          <div class="dropdown-menu">
            <ul>
              <li class="dropdown-header">Total Registrations</li>
              
            
             
            </ul>
          </div>
        </li>
        <li class="dropdown profile">
          <a href="dashboard.php" class="dropdown-toggle"  data-toggle="dropdown">
            <img class="profile-img" src="assets/images/profile.png">
            <div class="title">Profile</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username"><?php echo $_SESSION["name"] ?></h4>
            </div>
            <ul class="action">
              <li>
                <a href="dashboard.php">
                  Profile
                </a>
              </li>
             
              <li>
                <a href="registration.php">
                  New Registration
                </a>
              </li>
			   <li>
                <a href="registered.php">
                 Registered Students
                </a>
              </li>
              <li>
                <a href="logout.php">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

 <div class="row">
  
 <div class="col-md-12">
 <div class="card">
        <div class="card-header">
          
		    <div class="col-md-6">
			<form method = "post"  action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		  <div class="form-group" >
		  <div class="col-md-9 col-md-offset-3"> 
		   <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">
        <i class="fa fa-user" aria-hidden="true"></i></span>
      <input type="text" id="rows"  name="rows" class="form-control" placeholder="Enter the number of students to be registered" >
    </div>
		  <span>
		   <input class="btn btn-primary" type="submit" name="enter" value="Enter" id="enter">
		   
		 
		
		  </div>
        </div>
		</form>
		</div>
		</div>
        <div class="card-body no-padding">
 
  <form class="form" method="post"  action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<table  id="mytable" class=" table table-striped primary  table-hover" cellspacing="0" width="100%">
 
      <thead>
        <tr>
          <th>SI No</th>
          <th>Student Name</th>
          <th>Class</th>
        </tr>
      </thead>
	  
<?php
	   
	  if (isset($_POST['rows'])){
	   $rows=$_POST['rows'];
	   
	  
	  
	  
for($i = 0;$i < $rows;$i=$i+1)
	{
		$str = "sname".$i;
		$str1 = "class".$i;
		echo '<input type="hidden" name="count" value='.$rows.'>';
		echo    
   		 '<tr>
		 <td> '.($i+1).'</td>
        <td><input required type="text" class="form-control" name="'.$str.'" placeholder="Name"></td>
        <td><select name="'.$str1.'" class="form-control">
		<option   value=""  disabled="disabled" selected="selected">Class</option>
<option value="VI">VI</option>
<option value="VII">VII</option>
<option value="VIII">VIII</option>
<option value="IX">IX</option>
<option value="X">X</option>
<option value="XI">XI</option>
<option value="XII">XII</option>
</select></td>

       
    
  </tr>';

	}
	echo '<script>
			$(document).ready(function(){
				
				$("#submit").show();
			});
		  </script>';
	  }
	  else
	  {
		  echo '<script>
			$(document).ready(function(){
				
				$("#submit").hide();
			});
		  </script>';
	  }
	  ?>
 
    </table>
	
	
	</div>
	
	
	</div>
	 
	</div>
	
        <div class="card-header">
	<div class="form-group" >
		  <div class="col-md-9 col-md-offset-5"> 
	 <input class="btn btn-primary" type="submit" name="submit" value="Submit" id="submit">
	 </div>
	 </div>
	 </div>
	 
   </form>
	</div>


	




 <footer class="app-footer"> 
  <div class="row">
    <div class="col-xs-12">
      <div class="footer-copyright">
        Copyright &copy; 2017 Alma Fiesta Web and Development
      </div>
    </div>
  </div>
</footer>

  
 </div>
 </div>

  
  <script type="text/javascript" src="assets/js/vendor.js"></script>
  <script type="text/javascript" src="assets/js/app.js"></script>

</body>
</html>
