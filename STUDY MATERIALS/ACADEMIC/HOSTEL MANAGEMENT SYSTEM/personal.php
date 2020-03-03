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
<font size="5"><center><b><p style="border:3px inset skyblue;margin-left:25%;margin-right:25%;">Personal details</p></b></center></font>
<form name="f1" action="" method="post"> <br>
<center><table cellspacing="30px"  width="50%" bgcolor="#e6e8ed">
<tr><td>Name</td><td><input type="text" name="a1" ></td></tr>
<tr><td>father name</td><td><input type="text" name="a3"></td></tr>
<tr><td>Date of Birth</td><td><input type="text" name="a4" placeholder="example : dd/mm/yyyy"></td></tr>
<tr><td>Mobile number</td><td><input type="text" name="a5"></td></tr>
<tr><td>Address</td><td><textarea rows="4" cols="23" name="a6"></textarea></td></tr>
<tr><td colspan="2" align="center"><input type="submit" style="width:100px" name="submit"></td></tr>
</table>
</center>
</form>
</body>
</html>


<?php
$connection = mysqli_connect("localhost", "root", "") or die("unable  to connect"); // Establishing Connection with Server
mysqli_select_db($connection,"hostel management"); // Selecting Database from Server


if(isset($_POST["submit"]))
{ 
	$query1 = "CREATE TABLE personal_details(name VARCHAR(30) NOT NULL,registration_number varchar(10) primary key,father_name varchar(30),date_of_birth date,mobile_number varchar(10),address varchar(100))";
	$run1=mysqli_query($connection,$query1);
	$query4 = "CREATE TABLE user_hostel_details(registration_number VARCHAR(30) primary key,mess_id varchar(30),room_no varchar(30),activity_id varchar(30))";
	$run4=mysqli_query($connection,$query4);
	$name = $_POST["a1"];
	$rno=$_SESSION['reg'];
	$fn = $_POST["a3"];
	$dob = $_POST["a4"];
	$mno = $_POST["a5"];
	$add = $_POST["a6"];
	$check=	("SELECT * FROM personal_details WHERE registration_number='$rno'");
	$result = mysqli_query($connection,$check);
	if(mysqli_num_rows($result) >= 1)
	{
		echo "<script type='text/javascript'>alert('already stored');</script>";
	}
	else
	{
	if($name !='' && $rno !='' && $fn !=''&&$dob !=''&&$mno !=''&&$add !='')
	{
		$query2 = ("insert into personal_details(name,registration_number,father_name,date_of_birth,mobile_number,address) values ('$name', '$rno', '$fn', '$dob' , '$mno','$add')");
		$query3 = ("insert into user_hostel_details(registration_number) values ('$rno')");
		$run2=mysqli_query($connection,$query2);
		$run3=mysqli_query($connection,$query3);
		echo "<script type='text/javascript'>alert('Successfuly added');</script>";
		
	}
	else
	{
		echo "<script type='text/javascript'>alert('Can not submit because some fields are blank');</script>";
	}
	}
	
}	
mysqli_close($connection); // Closing Connection with Server
?>