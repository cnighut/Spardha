<?php
@ob_start();
session_start();
if(!isset($_SESSION['validuser']) || $_SESSION['validuser']==false){
header("location: login.php");
}?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  
  
    
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">
  <link rel="icon" href="almalogo.png?" type="image/x-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">



  
	
	
	
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.min.css">
	
	
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
							  $("#totalreg2").html(data);
							  
                        }
                      });
                    }
 totalreg();


 });
	</script>
</head>
<body>

<?php 
$name="";
$host="localhost";
$user="root";
$password="";

define('DB_NAME',"spardha18");

$con= mysql_connect($host,$user,$password);


if($con  ){
	
}
else{
echo "Not Connected";
}

$db= mysql_select_db(DB_NAME,$con);

$query = mysql_query("SELECT * FROM Teacher where email= '".$_SESSION['email']."'") ;
$query1 = mysql_query("SELECT * FROM sinfo where email= '".$_SESSION['email']."'") ;

 $_SESSION["totalreg"]= mysql_num_rows($query1) ;
  

		$row = mysql_fetch_array($query) or die(mysql_error());

if(!empty($row['email']))
{
 $_SESSION['email']= $row['email']  ;	
 $_SESSION['name']= $row['Name']  ;	
  $_SESSION['mobno']= $row['mobno']  ;
  $_SESSION['school']= $row['school']  ;
   $_SESSION['address']= $row['sa']  ;
	
    $_SESSION['state']= $row['state']  ;
 
   
	
}


else{
	echo "Failed";}?>

  <div class="app app-default">

<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="index.html" target="_blank"><span class="highlight">SPARDHA'18</span> User</a>

    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li class="active">
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
      <li class="">
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
        <a href="index.html" target="_blank"  >
		 
		
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
        <li class="navbar-title">Dashboard</li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        
        <li class="dropdown notification danger">
          <a href="registered.php" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-check" aria-hidden="true"></i></div>
            <div class="title">Total Registrations</div>
            <div class="count" ><span  id="totalreg2"></span></div>
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
              <h4 class="username"> <?php echo $_SESSION["name"] ?></h4>
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
        <div class="col-xs-12">

            <div id="my-calendar"></div>
			

            <script type="application/javascript">
			
			myDateFunction(this.id);
function myDateFunction(id) {
  var date = $("#" + id).data("date");
  var hasEvent = $("#" + id).data("hasEvent");
}
			var eventData = [
    {"date":"2017-10-15","badge":true,"title":"Registrations begins"},
    {"date":"2017-11-15","badge":true,"title":"Last Date for Registrations"},
	{"date":"2017-11-25","badge":true,"title":"Last Date for Correction of details"},
	{"date":"2018-01-12","badge":false,"title":"Alma Fiesta Begins"},
	{"date":"2018-01-13","badge":false,"title":"Enjoy the moment"},
	{"date":"2018-01-14","badge":false,"title":"See you again"},
];
                $(document).ready(function () {
                    $("#my-calendar").zabuto_calendar({
					data: eventData,
					action: function () {
                return myDateFunction(this.id, false);
            },
					year: 2017,
				 
				  show_previous: false,
				  show_next: 4,
					 cell_border: true,
					  today: true,
					  show_days: true,
					  weekstartson: 1,
					  
					  legend: [
					  
        {type: "text", label: "Important Date", badge: "00"},
		{type: "block", label: "Fest Days", badge: "00"},
       ],
					  nav_icon: {
						prev: '<i class="fa fa-chevron-circle-left"></i>',
						next: '<i class="fa fa-chevron-circle-right"></i>'
						
      }});
                });
            </script>

        </div>
        <div class="col-xs-6 col-xs-offset-1">


        </div>
    </div>
	

	
	
	
  
<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-green-light">
  <div class="card-body">
    <i class="icon fa fa-user fa-4x"></i>
    <div class="content">
      <div class="title">Contact details</div>
      <div class="value"><span class="sign"></span>  <?php echo $_SESSION["name"] ?> </div>
	  <div class="cemail"><?php echo $_SESSION["mobno"] ?></div>
	   <div class="cemail"><?php echo $_SESSION["email"] ?></div>
    </div>
  </div>
</a>

  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a class="card card-banner card-blue-light">
  <div class="card-body">
    <i class="icon fa fa-graduation-cap fa-4x"></i>
    <div class="content">
      <div class="title">School Details</div>
      <div class="cschool"><span class="sign"></span><?php echo $_SESSION["school"] ?> </div>
	   <div class="cschoolad"><span class="sign"></span><?php echo $_SESSION["address"] ?></div>
	     <div class="cschoolad"><span class="sign"></span><?php  echo $_SESSION["state"] ?></div>
		
    </div>
  </div>
</a>

  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" >
      <a class="card card-banner card-yellow-light">
  <div class="card-body">
    <i class="icon fa fa-registered fa-4x"></i>
    <div class="content">
      <div class="title">Total Registrations</div>
      <div class="value"><span class="sign" id="totalreg1"></span></div>
    </div>
  </div>
</a>

  </div>
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

   <script src="assets/scripts/zabuto_calendar.min.js"></script>
</body>
</html>
