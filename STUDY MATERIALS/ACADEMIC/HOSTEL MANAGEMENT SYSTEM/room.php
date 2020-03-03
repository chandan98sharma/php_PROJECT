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
<li><a href=#><font color="white">About</font></a></li>
</ul>
</div>
<br>
<font size="5"><center><b><p style="border:3px inset skyblue;margin-left:25%;margin-right:25%;">Room details</p></b></center></font>
<form name="f1" action='' method='post'> <br><br><br>
<center><table cellspacing="40px"  width="50%" bgcolor="#e6e8ed">
<tr><td>4-Bed Ac room</td><td><input type="radio" name="rr" value="101">101<br><input type="radio" name="rr" value="102">102<br><input type="radio" name="rr" value="103">103</td>
<td>4-Bed Non-Ac room</td><td><input type="radio" name="rr" value="201">201<br><input type="radio" name="rr" value="202">202<br><input type="radio" name="rr" value="203">203</td></tr>
<tr><td>6-Bed Ac room</td><td><input type="radio" name="rr" value="104">104<br><input type="radio" name="rr" value="105">105<br><input type="radio" name="rr" value="106">106</td>
<td>6-Bed Non-Ac room</td><td><input type="radio" name="rr" value="204">204<br><input type="radio" name="rr" value="205">205<br><input type="radio" name="rr" value="206">206</td></tr>
<tr><td colspan="4" align="center"><input type="submit" style="width:100px;" name="submit1"></td></tr>
</table>
</center>
</body>
</html>


<?php
$connection = mysqli_connect("localhost", "root", "") or die("unable  to connect"); // Establishing Connection with Server
mysqli_select_db($connection,"hostel management"); // Selecting Database from Server

if(isset($_POST['submit1']))
{ 
	$query1 = "CREATE TABLE room_details(room_no VARCHAR(30) primary key,room_type varchar(10),no_of_bed varchar(10),available int,fees varchar(20))";
	$run1=mysqli_query($connection,$query1);
	$query3 = "CREATE TABLE user_hostel_details(registration_number VARCHAR(30) primary key,mess_id varchar(30),room_no varchar(30),activity_id varchar(30))";
	$run3=mysqli_query($connection,$query3);
	$rn = $_POST["rr"];
	$check=	("SELECT * FROM room_details WHERE room_no='101'");
	$result = mysqli_query($connection,$check);
	if(mysqli_num_rows($result) == 0)
	{
		$query2 = ("insert into room_details(room_no,room_type,no_of_bed,available,fees) values ('101', 'ac', '4',4, '50000'),('102', 'ac', '4',4, '50000'),('103', 'ac', '4',4, '50000'),('104', 'ac', '6',6, '40000'),('105', 'ac', '6',6, '40000'),('106', 'ac', '6',6, '40000'),('201', 'non-ac', '4',4, '30000'),('202', 'non-ac', '4',4, '30000'),('203', 'non-ac', '4',4, '30000'),('204', 'non-ac', '6',6, '25000'),('205', 'non-ac', '6',6, '25000'),('206', 'non-ac', '6',6, '25000')");
		$run2=mysqli_query($connection,$query2);
	}
	
	$r=$_SESSION['reg'];
	
	$check5=	("SELECT * FROM user_hostel_details WHERE registration_number='$r' and room_no!=''");
	$result5 = mysqli_query($connection,$check5);
	if(mysqli_num_rows($result5) == 1)
	{
		echo "<script type='text/javascript'>alert('already stored');</script>";
	}
	else
	{
	
	$check1 =("SELECT * FROM room_details where room_no='$rn' and available > 0");
	$result1 = mysqli_query($connection,$check1);
	if(mysqli_num_rows($result1) != 0)
	{
		
	$query4 = ("update user_hostel_details set room_no='$rn' where registration_number='$r'");
	$run4=mysqli_query($connection,$query4);
	echo "<script type='text/javascript'>alert('Successfuly added');</script>";
	$Check2 = "SELECT available FROM room_details WHERE room_no = '$rn'";
    $result2 = mysqli_query($connection,$Check2);
    $row = mysqli_fetch_assoc($result2);
    if($row['available'] > '0'){
    $query5= "UPDATE room_details SET available = ".$row['available']." - 1 WHERE room_no = '$rn'";
    $run5=mysqli_query($connection,$query5);
    }
	}
    else
    {
	echo "<script type='text/javascript'>alert('select another room this room is already filled');</script>";
    }
	
	
	}	

}	
mysqli_close($connection); // Closing Connection with Server
?>