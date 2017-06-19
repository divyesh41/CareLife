<?php 	
		ob_start(); 
		session_start();
?>
<?php include_once("conn.php"); ?>
<html>
<head>
</head>
<body>
<h1>Login<h1>

<form action='' method='post' name="form1">
<table align='left'>
<tr><td>User name:</td><td><input type='text' name='name'/></td></tr>
<tr><td>Password:</td><td><input type='password' name='pwd'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
<tr></tr>
<tr><td><p><a href="usereg.php"> user registration</a></p></td></tr>

</table>
</form>
<?php

if(isset($_POST['submit']))
{
 $name=$_POST['name'];
 $pwd=$_POST['pwd'];
 if($name!=''&&$pwd!='')
 {
	$q="select * from tblLogin where Username ='".$name."'";
	$query=mysqli_query($con,$q) or die(mysqli_error($con));
	
	$res=mysqli_fetch_assoc($query);
   
   if($res)
   {
    $_SESSION['name']=$name;
    header('location:userhome.php');
   }

/*	elseif($res)
	{
		$ut=="admin";
		header("location:adminhome.php");
		
	}*/
   else
   {
    echo'You entered username or password is incorrect';
   }
 }
 else
 {
  echo'Enter both username and password';
 }
}
?>


</body>
</html>
