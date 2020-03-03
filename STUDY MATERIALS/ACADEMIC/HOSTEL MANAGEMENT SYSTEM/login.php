<?php
	session_start();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>

h1{
background-color:#4a4c47;
font-family:Mongolian Baiti;
color:rgb(240, 242, 237);
padding-top:5px;
}
</style>
</head>




<body bgcolor="skyblue" style="text-align: center;">
<h1 align="center">Hostel management system</h1><br><br>
<div class="container">
        <form method="post" action="">
            <table cellspacing="30px"  width="50%" bgcolor="#e6e8ed" align='center' class="table table-hover" style="text-align: center;">
                <tr bgcolor="orange">                
                    <td colspan="3" align="center"><font color="white" size='5'>Enter login details</font></td>

                </tr>
                <tr height="20"></tr>

                <tr>
                    <td><font color="black" size='4'>User Name</font></td>
                    <td>:</td>
                    <td>
                        <input type="text" name="username"/>
                    </td>
                </tr>
                <tr>
                    <td><font color="black" size='4'>Password</font></td>
                    <td>:</td>
                    <td>
                        <input type="password" name="password"/>
                    </td>
                </tr>

                <tr height="10"></tr>
                <tr>
                    <td align="center" colspan='3'><input type="submit" value="Submit" name='submit'></td>
                </tr>
            </table>
        </form><br><br><br>
</div>

	    <a href="sign up.php" class="btn btn-md btn-primary">Sign up</a></font></p>
</body>
</html>

<?php
$connection = mysqli_connect("localhost", "root", "") or die("unable  to connect"); // Establishing Connection with Server
mysqli_select_db($connection,"hostel management"); // Selecting Database from Server

if(isset($_POST['submit']))
{ 
	$us=$_POST['username'];
	$pas=$_POST['password'];
	
	
	
	$check=	("SELECT * FROM login WHERE username='$us' and password='$pas'");
	$result = mysqli_query($connection,$check);
	if(mysqli_num_rows($result) > 0)
	{
		header("Location: sidebar2.php");
	}
	else
	{
			echo "<script type='text/javascript'>alert('invalid username or password');</script>";
	}
	
$Check = "SELECT registration_number FROM login WHERE username='$us'";
$result1 = mysqli_query($connection,$Check);
$row2 = mysqli_fetch_assoc($result1);
$temp=$row2['registration_number'];
$_SESSION['reg'] = $temp;
}	
mysqli_close($connection); // Closing Connection with Server
?>
