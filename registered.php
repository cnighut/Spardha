<?php
session_start();
if(!$_SESSION['validuser']){
header("location: login.php");}?>

<!DOCTYPE html>
<html>
<head>
  <title>Registered</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="assets/css/theme/yellow.css">
<link rel="icon" href="almalogo.png?" type="image/x-icon">
  
  <script type="text/javascript">
 

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Registered Students');
        mywindow.document.write('<html><head><title>SPARDHA Registrations</title>');
		 
       
		  
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
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
      <li class="">
        <a href="registration.php">
          <div class="icon">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
          </div>
          <div class="title">Register</div>
        </a>
      </li>
      <li class="active ">
        <a href="registered.php" >
          <div class="icon">
            <i class="fa fa-registered" aria-hidden="true"></i>
          </div>
          <div class="title">Registered</div>
        </a>
        
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
        <li class="navbar-title">Registered students</li>
       
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
        
        <div class="card-body no-padding" id="print" >
 
  <form class="form" method="post"  action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<table  id="mytable" class=" table table-striped primary  table-hover" cellspacing="0" width="100%" border="1px "  bordercolor="#E7EDEE" >
 
      <thead>
        <tr>
          <th style="text-align:center;  ">SI No</th>
		   <th style="text-align:center;  ">SPARDHA ID</th>
          <th style="text-align:center;">Student Name</th>
          <th style="text-align:center;">Class</th>
        </tr>
      </thead>
	 
<?php
 
	 /*Connection*/
	 
        $servername = "localhost";  
       $username = "root";  
       $password = "";  
define('DB_NAME',"spardha18");

$con= mysql_connect($host,$user,$password);


if($con  ){
	
}
else{
echo "Not Connected";
}

$db= mysql_select_db(DB_NAME,$con);

$query = mysql_query("SELECT * FROM sinfo where email= '".$_SESSION['email']."'");

 $_SESSION["totalreg"]= mysql_num_rows($query) ;
 
 if(mysql_num_rows($query)>0){
	  $x=1;
	  while($d=mysql_fetch_assoc($query)){
	echo '<tr style="text-align:center;">
    <td>'.$x.'</td>
	<td>'.$d['rollno'].'</td>
	<td>'.$d['name'].'</td>
	
    <td>'.$d['class'].'</td> </tr>';
   
  $x++;
 
		  }
	  }
	  else{
		  echo ' &nbsp &nbsp   You had not registered any students  till now';
	  }?>
	

    </table>
	
	
	
	</div>
	
	</div>
	 
	</div>
	
     
	 
        <div class="card-header">
	<div class="form-group" >
		  <div class="col-md-9 col-md-offset-5"> 
		
		
	 <button class="btn btn-primary" type="button" name="print" onclick="PrintElem('#print')" value="Print" >
	   <span><i class="fa fa-print fa-2x" aria-hidden="true"></i></span>&nbsp; Print</button>
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
