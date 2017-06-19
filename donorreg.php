<?php session_start(); ?>
<?php include_once("conn.php"); ?>
<html>
<head>
<?php
	if(isset($_POST["Submit"]))
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
	
		$fn=$_POST["txtFirstName"];
		$ln=$_POST["txtLastName"];
		//for dob
		//$day=$_POST['day'];
		//$month=$_POST['month'];
		//$year=$_POST['year'];
		$dob=$_POST["txtBirthday"];
		$bg=$_POST["txtBloodGroup"];
		$gen=$_POST["gender"];
		$ad=$_POST["txtAddress"];
		$ct=$_POST["txtCity"];
		$cno=$_POST["txtContactNo"];
		$ava=$_POST["availability"];
		
	//fill in blank velidation
 		
		$q="insert into tbldonor (FirstName,LastName,BirthDate,BloodGroup,Gender,Address,City,ContactNo,ReportPath,Availability) values('$fn','$ln','$dob','$bg','$gen','$ad','$ct','$cno','$mr','$ava');";
		
		mysqli_query($con,$q) or die(mysqli_error($con));
}
	?>
</head>
</html>
<body>	
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table width="318" border="0">
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
      <td>
      
        <input name="gender" type="radio" value="male">
      </label>
        Male
        <label>
        <input name="gender" type="radio" value="female">
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
        <input type="file" name="file">
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
