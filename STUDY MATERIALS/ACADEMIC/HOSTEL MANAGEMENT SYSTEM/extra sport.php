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
    <button class="dropbtn">Account<img src="arrow.png" height="12" width="25">
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
<li><a href=personal.html><font color="white">Personal Details</font></a></li>
<li><a href=hostel.html><font color="white">Hostel Info</font></a></li>
<li><a href=mess.html><font color="white">Mess Info</font></a></li>
<li><a href=extra.html><font color="white">Extra curricular activities</font></a></li>
<li><a href=show.html><font color="white">Show my info</font></a></li>
</ul>
</div>
<br>
<font size="5"><center><b><p style="border:3px inset skyblue;margin-left:25%;margin-right:25%;">Extra Curricular Activity - Sports</p></b></center></font>
<form name="f1"> <br><br><br>
<center><table cellspacing="40px"  width="50%" bgcolor="#e6e8ed">
<tr><td align="justify" style="padding-bottom:60px">Choose Sport</td><td><input type="radio" name="sp" value="Swimming"> Swimming<br><input type="radio" name="sp" value="Badminton"> Badminton<br><input type="radio" name="sp" value="Basket Ball"> Basket Ball<br><input type="radio" name="sp" value="Football"> Football</td></tr>
<tr><td>Choose Time Slot</td>
<td>
<select name="s1">
<option value="select time">select time</option>
<option value="7-8 am">7-8 am</option>
<option value="8-9 am">8-9 am</option>
<option value="5-6 pm">5-6 pm</option>
<option value="6-7 pm">6-7 pm</option>
<option value="7-8 pm">7-8 pm</option>
</select>
</td></tr>
<tr><td colspan="2" align="center"><input type="submit" style="width:100px" value="Register"></td></tr>
</table>
</center>
</body>
</html>