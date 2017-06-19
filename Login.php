<?php 
session_start(); 
if(isset($_SESSION['login_user'])){
header("location: Userhome.php");
}
?>
<!DOCTYPE html>
<html >
  <head>
    
  </head>

  <body>
  <?php
$eusername = $epassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$valid=true;
   if (empty($_POST["username"])) 
   {
     $eusername = "UserName is required";
	 $valid=false;
   } else
    {

	if (!preg_match("/^[a-zA-Z\d]*$/",$_POST["username"])) 

	{
  		$eusername = "Only letters and digits allowed"; 
		$valid=false;
	}
   }
   
 

   if (empty($_POST["password"]))
    {
     $epassword = "PassWord is required";
	 $valid=false;
   } 
   else 
   {
     

	if (!preg_match("/^[a-zA-Z\d]*$/",$_POST["password"])) 

	{
  		$epassword = "Only letters and digits allowed"; 
		$valid=false;
	}
   
 }


  if($valid)
 {
 
 $valid=false;
 $username=$_POST['username'];
 $password=$_POST['password'];
 
$con=mysql_connect('localhost','root','');
mysql_select_db('bloodbank',$con);
$q1="select * from tbllogin";
$k=mysql_query($q1,$con);
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
while($row=mysql_fetch_array($k))
{	
	
	if($row['username']==$username && $row['password']==$password)
		{
		$_SESSION['login_user']=$username;
		$valid=true;
		
		}
	
} 
if($valid)
{
if($username=="admin" && $password=="admin")
{
header('location:mainadmin.php');
}
else
{
if(isset($_SESSION['login_user'])){
header('location:main.php');
}
}
}
else
{?>
<script type="text/javascript">
	alert("Please Enter Correct Data");
</script>
<?php 
 $k1=$username;
 $k2=$password;
 
}

  
 }
}

mysql_close($con);
   
?>
<div class="body"></div>
    
		<div class="grad"></div>
		
		<br>
		<div class="login">
		
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
				<font color="#990033">
				<div id="login-wrap">
				<input type="text" placeholder="USERNAME" name="username" id="username" >*<br><?php echo $eusername;?><br>
				<input type="password" placeholder="PASSWORD" name="password" id="password" >*<br><?php echo $epassword;?><br>
				</div>
					<input type="submit" value="Login " onClick="header"  id="login"></font></form>
				
				<div class="registration">
					<div><a href="registration.php" style="color:#999"><h4> Create an account?? </a></div>
		</div>
    

    
    
    
    
  </body>
</html>



        