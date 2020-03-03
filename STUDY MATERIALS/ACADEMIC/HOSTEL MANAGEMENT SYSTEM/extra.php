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
<font size="5"><center><b><p style="border:3px inset skyblue;margin-left:25%;margin-right:25%;">Extra Curricular Activity</p></b></center></font>
<form name="f1" method="post" action=""> <br><br><br>
<center><table cellspacing="40px"  width="50%" bgcolor="#e6e8ed">
<tr><td align="justify" style="padding-bottom:60px">Choose Sport</td><td><input type="radio" name="sp" value="swimming"> Swimming<br><input type="radio" name="sp" value="badminton"> Badminton<br><input type="radio" name="sp" value="basketball"> Basket Ball</td></tr>
<tr><td>Choose Time Slot</td>
<td>
<select name="s1">
<option value="select time">select time</option>
<option value="5-6 pm">5-6 pm</option>
<option value="6-7 pm">6-7 pm</option>
<option value="7-8 pm">7-8 pm</option>
</select>
</td></tr>
<tr><td colspan="2" align="center"><input type="submit" style="width:100px" value="Register" name="submit"></td></tr>
</table>
</center>
</body>
</html>



<?php
$connection = mysqli_connect("localhost", "root", "") or die("unable  to connect"); // Establishing Connection with Server
mysqli_select_db($connection,"hostel management"); // Selecting Database from Server

if(isset($_POST['submit']))
{ 
	$query1 = "CREATE TABLE activity_details(activity_id VARCHAR(30) primary key,activity_name varchar(30),activity_time varchar(10),fees varchar(10))";
	$run1=mysqli_query($connection,$query1);
	$query3 = "CREATE TABLE user_hostel_details(registration_number VARCHAR(30) unique,mess_id varchar(30),room_no varchar(30),activity_id varchar(30))";
	$run3=mysqli_query($connection,$query3);
	$aid=0;
	$a = $_POST["sp"];
	$t = $_POST["s1"];
	$r=$_SESSION['reg'];
	$check=	("SELECT * FROM activity_details WHERE activity_id='a101'");
	$result = mysqli_query($connection,$check);
	if(mysqli_num_rows($result) == 0)
	{
		$query2 = ("insert into activity_details(activity_id,activity_name,activity_time,fees) values('a101', 'swimming', '5-6 pm', '4000'),('a102', 'badminton', '5-6 pm', '5000'),('a103', 'basketball', '5-6 pm', '3000'),('a104', 'swimming', '6-7 pm', '4000'),('a105', 'badminton', '6-7 pm', '5000'),('a106', 'basketball', '6-7 pm', '3000'),('a107', 'swimming', '7-8 pm', '4000'),('a108', 'badminton', '7-8 pm', '5000'),('a109', 'basketball', '7-8 pm', '3000')");
		$run2=mysqli_query($connection,$query2);
	}
	if($a =='swimming' && $t =='5-6 pm')
	{
		$aid='a101';
	}
	else if($a =='badminton' && $t =='5-6 pm')
	{
		$aid='a102';
	}
	else if($a =='basketball' && $t =='5-6 pm')
	{
		$aid='a103';
	}
	else if($a =='swimming' && $t =='6-7 pm')
	{
		$aid='a104';
	}
	else if($a =='badminton' && $t =='6-7 pm')
	{
		$aid='a105';
	}
	else if($a =='basketball' && $t =='6-7 pm')
	{
		$aid='a106';
	}
		else if($a =='swimming' && $t =='7-8 pm')
	{
		$aid='a107';
	}
	else if($a =='badminton' && $t =='7-8 pm')
	{
		$aid='a108';
	}
	else if($a =='basketball' && $t =='7-8 pm')
	{
		$aid='a109';
	}
	
	if($aid!='0')
	{
	$check5=	("SELECT * FROM user_hostel_details WHERE registration_number='$r' and activity_id!=''");
	$result5 = mysqli_query($connection,$check5);
	if(mysqli_num_rows($result5) == 1)
	{
		echo "<script type='text/javascript'>alert('already stored');</script>";
	}
	else
	{
	$query4 = ("update user_hostel_details set activity_id='$aid' where registration_number='$r'");
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