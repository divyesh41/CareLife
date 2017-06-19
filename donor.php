
<?php include_once("conn.php"); ?>
<?php include_once("checkuser.php"); ?>
<html>
<head>
<?php
	if(isset($_REQUEST["Submit"]))
	{
	
	
	$mr=$_FILES["file"]["name"];
		if(!strstr($mr,"pdf"))
		{
		echo "Only PDf Files Allowed";
		return;
		}
	$mr=time();
	$mr=$mr."pdf";
	$tp=$_FILES["file"]["tmp_name"];
	move_uploaded_file($tp,"report/".$mr);
	
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
		$ct=$_REQUEST["txtCity"];
		$cno=$_REQUEST["txtContactNo"];
		$last=$_REQUEST["txtLastDonate"];
		$ava=$_POST["availability"];
		
		$q="insert into tbldonorreg (LoginID,FirstName,LastName,BirthDate,BloodGroup,Gender,Address,City,ContactNo,ReportPath,LastDonate,Availability) values('$lid','$fn','$ln','$bth','$bg','$gen','$ad','$ct','$cno','$mr','$last','$ava');";
		
		mysqli_query($con,$q) or die(mysqli_error($con));
		
		//header("location:profile.php");
	}
	?>
</head>
</html>
<body>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="318" border="0">
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
      <td width="188">FirstName</td>
      <td width="120"><label>
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
      </label>
        Male
        <label>
        <input name="radiogen" type="radio" value="female">
        </label>
        Female</td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label>
        <textarea name="txtAddress"></textarea>
      </label></td>
    </tr>
	<tr>
	<td>City</td>
	<td><label>
	<input type="text" name="txtCity">
	</label></td>
	</tr>
    <tr>
      <td>ContactNo</td>
      <td><label>
        <input type="text" name="txtContactNo">
      </label></td>
    </tr>
    <tr>
      <td>MedicalReport</td>
      <td><label>
          <input type="file" name="file"/>
      </label></td>
    </tr>
	<tr>
      <td>LastDonate</td>
      <td><label>
          <input type="date" name="txtLastDonate"/>
      </label></td>
    </tr>
	<tr>
      <td>Availability</td>
      <td>
        <input name="availability" type="radio" value="yes">
      </label>
        Yes
        <label>
        <input name="availability" type="radio" value="no">
        </label>
        No</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit">
      </label></td>
    </tr>
  </table>
<p> Click here to clean <a href = "signout.php" title = "Logout">Session.
</p>

</form>
