<?php ob_start(); ?>
<?php include_once("conn.php"); ?>
<html>
<head>
</head>
<body>
<h1>Login<h1>

<form action='' method='post' name="form1">
<table cellspacing='5' align='left'>
<tr><td>User name:</td><td><input type='text' name='name'/></td></tr>
<tr><td>Password:</td><td><input type='password' name='pwd'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>

</form>
<?php
session_start();
if(isset($_POST['submit']))
{
 $name=$_POST['name'];
 $pwd=$_POST['pwd'];
 if($name=="admin"&&$pwd=="admin")
 {
	$_SESSION['name']=$name;
    header('location:adminhome.php');
   }
   else
   {
    echo'You are not a Admin';
   }
 
}
?>
</body>
</html>