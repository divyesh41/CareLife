<?php include_once("conn.php"); ?>
<?php include_once("checkuser.php"); ?>
<html>
<head>
<?php
	if(isset($_REQUEST["Submit"]))
	{
	
		$un=$_REQUEST["txtUserName"];
	
	$q="select * from tblLogin where UserName ='".$un."'";
	$qr=mysqli_query($con,$q) or die(mysqli_error($con));
	
	if($res=mysqli_fetch_assoc($qr))
	{
	echo "User Already exists !!";
	return;
	}
		$ps=$_REQUEST["txtPassword"];
		$cps=$_REQUEST["txtCPassword"];
		$ut="user";
		$q="insert into tblLogin (Username,Password,UserType) values('$un','$ps','$ut');";
		
		$qr=mysqli_query($con,$q) or die(mysqli_error($con));
		$lid =mysqli_insert_id($con);
		
		
		$fn=$_REQUEST["txtFirstName"];
		$ln=$_REQUEST["txtLastName"];
		$age=$_REQUEST["txtAge"];
		$gen=$_REQUEST["radiobutton"];
		$cid=$_REQUEST["txtCityId"];
		
		
		$q="insert into tblneedy (LoginID,FirstName,LastName,Age,Gender,CityId) values('$lid','$fn','$ln','$age','$gen','$cid');";
		
		mysqli_query($con,$q) or die(mysqli_error($con));
		
		header("location:need.php");
	}
	?>
</head>
</html>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="281" border="0">
    <tr>
      <td width="127">UserName</td>
      <td width="144"><label>
        <input type="text" name="txtUserName" />
      </label></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label>
        <input type="password" name="txtPassword" />
      </label></td>
    </tr>
	<tr>
      <td>Confirm Password</td>
      <td><label>
        <input type="password" name="txtCPassword" />
      </label></td>
    </tr>
    <tr>
      <td>FirstName</td>
      <td><label>
        <input type="text" name="txtFirstName" />
      </label></td>
    </tr>
    <tr>
      <td>LastName</td>
      <td><label>
        <input type="text" name="txtLastName" />
      </label></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><label>
        <input type="text" name="txtAge" />
      </label></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><label>
        <input name="radiobutton" type="radio" value="male" />
      </label>
        male
        <label>
        <input name="radiobutton" type="radio" value="female" />
        </label>
        female</td>
    </tr>
    <tr>
      <td>CityId</td>
      <td><label>
        <input type="text" name="txtCityId" />
      </label></td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit">
      </label></td>
    </tr>
  </table>
  
</form>
</body>
</html>
