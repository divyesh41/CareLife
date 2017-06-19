<?php session_start(); ?>
<?php include_once("conn.php"); ?>
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
		$bth=$_REQUEST["txtBirthday"];
		$bg=$_REQUEST["txtBloodGroup"];
		$gen=$_REQUEST["radiogen"];
		$ad=$_REQUEST["txtAddress"];
		$cno=$_REQUEST["txtContactNo"];
		$hn=$_REQUEST["txtHospitalName"];
		$had=$_REQUEST["txtHospitalAdd"];
		$hno=$_REQUEST["txtHospitalContact"];
		
		$q="insert into tblneedyuser (LoginID,FirstName,LastName,BirthDate,BloodGroup,Gender,Address,ContactNo,HospitalName,HospitalAddress,HospitalContactNo) values('$lid','$fn','$ln','$bth','$bg','$gen','$ad','$cno','$hn','$had','$hno');";
		
		mysqli_query($con,$q) or die(mysqli_error($con));
		
		//header("location:.php");
	}
	?>
</head>
<body>
<form name="form1" method="post" action="">
  <table width="342" border="0">
   <tr>
      <td width="190">Username</td>
      <td width="136"><label>
        <input type="text" name="txtUserName">
      </label></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label>
        <input type="password" name="txtPassword">
      </label></td>
    </tr>
    <tr>
      <td>Confirm Password </td>
      <td><label>
        <input type="password" name="txtCPassword">
      </label></td>
    </tr>
    <tr>
      <td width="207">FirstName</td>
      <td width="125"><label>
        <input type="text" name="txtFirstName">
      </label></td>
    </tr>
    <tr>
      <td>LastName</td>
      <td><label>
        <input type="text" name="txtLastName">
      </label></td>
    </tr>
    <tr>
      <td>BirthDay</td>
      <td><label>
        <input type="date" name="txtBirthday">
      </label></td>
    </tr>
    <tr>
      <td>BloodGroup</td>
      <td><label>
        <select name="txtBloodGroup">
		<option value="A+">A+</option>
		<option value="A-">A-</option>
		<option value="B+">B+</option>
		<option value="B-">B-</option>
		<option value="A1+">A1+</option>
		<option value="A1-">A1-</option>
		<option value="A1B+">A1B+</option>
		<option value="A1B-">A1B-</option>
		<option value="A2+">A2+</option>
		<option value="A2-">A2-</option>
		<option value="A2B+">A2B+</option>
		<option value="A2B-">A2B-</option>
		<option value="O+">O+</option>
		<option value="O-">O-</option>
		</select>
      </label></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><label>
        <input name="radiogen" type="radio" value="male">
        Male
        <input name="radiogen" type="radio" value="female">
        Female
      </label></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label>
        <textarea name="txtAddress"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>ContactNo</td>
      <td><label>
        <input type="text" name="txtContactNo">
      </label></td>
    </tr>
    <tr>
      <td>Hospital Name </td>
      <td><label>
        <input type="text" name="txtHospitalName">
      </label></td>
    </tr>
    <tr>
      <td>Hospital Address </td>
      <td><label>
        <textarea name="txtHospitalAdd"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>Hospital Contact </td>
      <td><label>
        <input type="text" name="txtHospitalContact">
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit">
      </label></td>
    </tr>
  </table>
  <p>
  <a href="donorsearch.php">search donor</a>
</p>
<p> Click here to clean <a href = "signout.php" title = "Logout">Session.
</p>

</form>