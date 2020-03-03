
<!DOCTYPE html>
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




<body bgcolor="pink" style="text-align: center;">
<h1 align="center">Hostel management system</h1><br><br>
<div class="container">
    <form method="post" action="">
            <table cellspacing="30px"  width="50%" bgcolor="#e6e8ed" align='center' style="text-align: center;" class="table table-hover">
                <tr bgcolor="orange">                
                    <td colspan="3" align="center"><font color="white" size='5'>Sign up</font></td>

                </tr>
                <tr height="20"></tr>
                
                <tr>
                    <td><font color="black" size='4'>Registration number</font></td>
                    <td>:</td>
                    <td>
                        <input type="text" name="rnn">
                    </td>
                </tr>

                <tr>
                    <td><font color="black" size='4'>User Name</font></td>
                    <td>:</td>
                    <td>
                        <input type="text" name="username">
                    </td>
                </tr>
                <tr>
                    <td><font color="black" size='4'>Password</font></td>
                    <td>:</td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>

                <tr height="10"></tr>
                <tr>
                    <td align="center" colspan='3'><input type="submit" value="Submit" name="submit"></td>
                </tr>
            </table>
        </form><br><br><br>
</div>
    
		<a href="login.php" class="btn btn-md btn-warning">log in</a></font></p>
</body>
</html>

<?php
$connection = mysqli_connect("localhost", "root", "") or die("unable  to connect");
mysqli_select_db($connection,"hostel management");

if(isset($_POST['submit']))
{ 
	$regn=$_POST['rnn'];
	$us=$_POST['username'];
	$pas=$_POST['password'];
	
	
	$query1 = "CREATE TABLE login(registration_number VARCHAR(30),username varchar(10) unique,password varchar(30))";
	$run1=mysqli_query($connection,$query1);
	

	
	$check=	("SELECT * FROM login WHERE registration_number='$regn' or username='$us'");
	$result = mysqli_query($connection,$check);
	if(mysqli_num_rows($result) == 0)
	{
			$query2 = ("insert into login(registration_number,username,password) values('$regn','$us','$pas')");
			$run2=mysqli_query($connection,$query2);
		echo "<script type='text/javascript'>alert('Sign up successfull');</script>";
	}
	else
	{
			echo "<script type='text/javascript'>alert('username or registration number already exist');</script>";
	}
	

}	
mysqli_close($connection); 
?>
