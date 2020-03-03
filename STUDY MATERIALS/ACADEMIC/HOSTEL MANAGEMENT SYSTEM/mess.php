<?php
	session_start();
?>
<html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<style>
*{
margin:0px;
padding:0px;
font-family:Comic Sans MS;
}
h1{
background-color:#4a4c47;
font-family:Mongolian Baiti;
color:rgb(240, 242, 237);
padding-top:5px;
}
h5{
background-color:#4a4c47;
font-family:Comic Sans MS;
color:rgb(240, 242, 237);
padding-right:30px;
}

#sidebar{
position:fixed;
width:200px;
height:100%;
background:#151719;
transition:all 500ms linear;
  left:-200px;
}
#sidebar.active{
left:0px;
}

#sidebar ul li{color:rgba(230,230,230,0.9);
list-style:none;
padding:15px 10px;
border-bottom:1px solid rgba(100,100,100,0.3);
}
#sidebar  .toggle-btn{
position:absolute;
left:210px;
top:20px;
  }
#sidebar .toggle-btn span{
display:block;
width:30px;
height:5px;
background:#151719;
margin:5px 0px;
}

/* Navbar container */
.navbar {
  overflow: hidden;
  //background-color: #333;
  font-family: Arial;
}

/* Links inside the navbar */
.navbar a {
  float: right;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* The dropdown container */
.dropdown {
  float: right;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px; 
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}


.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #151719;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: red;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
  
</style>
<script>
function toggleSidebar(){
document.getElementById("sidebar").classList.toggle('active');
}
</script>
</head>
<body bgcolor="white">
<a href="sidebar2.php"><h1 align="center">Hostel management system</h1></a>
<h5 align="right">
<div class="navbar">
  <div class="dropdown">
    <button class="dropbtn"><?php

$conn= mysqli_connect("localhost", "root", "") or die("unable  to connect"); // Establishing Connection with Server
mysqli_select_db($conn,"hostel management"); // Selecting Database from Server

$a=$_SESSION['reg'];
echo $a;?>
&emsp;Account<img src="arrow.png" height="12" width="25">
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="login.php">Log out</a>
    </div>
  </div> 
 </div>
</h5>

<div id="sidebar">
<div class="toggle-btn" onclick="toggleSidebar()">
<span></span>
<span></span>
<span></span>
</div>
<ul>
<li><a href=personal.php><font color="white">Personal Details</font></a></li>
<li><a href=room.php><font color="white">Room Info</font></a></li>
<li><a href=mess.php><font color="white">Mess Info</font></a></li>
<li><a href=extra.php><font color="white">Extra curricular activities</font></a></li>
<li><a href=show.php><font color="white">Show my info</font></a></li>
</ul>
</div>
<br>
<font size="5"><center><b><p style="border:3px inset skyblue;margin-left:25%;margin-right:25%;">Mess details</p></b></center></font>
<form name="f1" action='' method='post'> <br><br><br>
<center><table cellspacing="40px"  width="50%" bgcolor="#e6e8ed">
<tr><td>Choose Mess Type</td><td><input type="radio" name="mt" value="north indian"> North Indian<br><input type="radio" name="mt" value="south indian"> South indian<br><input type="radio" name="mt" value="special"> Special</td></tr>
<tr><td>Choose Food Type</td><td><input type="radio" name="ft" value="vegetarian"> Vegetarian<br><input type="radio" name="ft" value="non-vegetarian"> Non-Vegetarian </td></tr>
<tr><td colspan="2" align="center"><input type="submit" style="width:100px;" name="submit1"></td></tr>
</table>
</center>
</body>
</html>


<?php
$connection = mysqli_connect("localhost", "root", "") or die("unable  to connect"); // Establishing Connection with Server
mysqli_select_db($connection,"hostel management"); // Selecting Database from Server

if(isset($_POST['submit1']))
{ 
	$query1 = "CREATE TABLE mess_details(mess_id VARCHAR(30) primary key,mess_type varchar(30),food_type varchar(30),fees varchar(10))";
	$run1=mysqli_query($connection,$query1);
	$query3 = "CREATE TABLE user_hostel_details(registration_number VARCHAR(30) primary key,mess_id varchar(30),room_no varchar(30),activity_id varchar(30))";
	$run3=mysqli_query($connection,$query3);
	$mid=0;
	$m = $_POST["mt"];
	$f = $_POST["ft"];
	$r=$_SESSION['reg'];
	$check=	("SELECT * FROM mess_details WHERE mess_id='m101'");
	$result = mysqli_query($connection,$check);
	if(mysqli_num_rows($result) == 0)
	{
		$query2 = ("insert into mess_details(mess_id,mess_type,food_type,fees) values ('m101', 'north indian', 'vegetarian', '50000'),('m102', 'north indian', 'non-vegetarian', '60000'),('m103', 'south indian', 'vegetarian', '45000'),('m104', 'south indian', 'non-vegetarian', '55000'),('m105', 'special', 'vegetarian', '65000'),('m106', 'special', 'non-vegetarian', '70000')");
		$run2=mysqli_query($connection,$query2);
	}
	if($m =='north indian' && $f =='vegetarian')
	{
		$mid='m101';
	}
	else if($m =='north indian' && $f =='non-vegetarian')
	{
		$mid='m102';
	}
	else if($m =='south indian' && $f =='vegetarian')
	{
		$mid='m103';
	}
	else if($m =='south indian' && $f =='non-vegetarian')
	{
		$mid='m104';
	}
	else if($m =='special' && $f =='vegetarian')
	{
		$mid='m105';
	}
	else if($m =='special' && $f =='non-vegetarian')
	{
		$mid='m106';
	}

	if($mid!='0')
	{
	$check=	("SELECT * FROM user_hostel_details WHERE registration_number='$r' and mess_id!=''");
	$result = mysqli_query($connection,$check);
	if(mysqli_num_rows($result) == 1)
	{
		echo "<script type='text/javascript'>alert('already stored');</script>";
	}
	else
	{
	$query4 = ("update user_hostel_details set mess_id='$mid' where registration_number='$r'");
	$run4=mysqli_query($connection,$query4);
	echo "<script type='text/javascript'>alert('Successfuly added');</script>";
	}	
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please fill all details');</script>";
	}
	
	
	
}	
mysqli_close($connection); // Closing Connection with Server
?>