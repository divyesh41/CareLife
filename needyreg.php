<?php session_start(); ?>
<?php include_once("conn.php"); ?>
<html>
<head>
<?php
$FirstNameErr = $LastNameErr = $genderErr = $ContactNoErr = "";
	   $FirstName = $LastName = $gender = $ContactNo = "";
	if(isset($_POST["Submit"]))
	{
	
		$fn=trim($_POST["FirstName"]);
		$ln=trim($_POST["LastName"]);
		//for dob
		//$day=$_POST['day'];
		//$month=$_POST['month'];
		//$year=$_POST['year'];
		$dob=$_POST["txtBirthday"];
		$bg=$_POST["txtBloodGroup"];
		$gen=$_POST["gender"];
		$ad=$_POST["txtAddress"];
		$cno=$_POST["ContactNo"];
		$hn=$_POST["txtHospitalName"];
		$ha=$_POST["txtHospitalAdd"];
		$hc=$_POST["txtHospitalContactNo"];
		
	//fill in blank validation
 		//$FirstNameErr = $LastNameErr = $genderErr = $ContactNoErr = "";
	   //$FirstName = $LastName = $gender = $ContactNo = "";
	   
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
         if (empty($_POST["FirstName"])) {
              $FirstNameErr = "Name is required";
          } else {
    	$FirstName = ($_POST["FirstName"]);
  	}
	
         if (empty($_POST["LastName"])) {
              $LastNameErr = "Name is required";
          } else {
    	$LastName = ($_POST["LastName"]);
  	}
	 if (empty($_POST["gender"])) {
    	$genderErr = "Gender is required";
     } else {
    $Gender = ($_POST["gender"]);
  }
  	if (empty($_POST["ContactNo"])) {
    	$ContactNoErr = "ContactNo is required";
     } else {
    $ContactNo = ($_POST["ContactNo"]);
  }
}
		$q="insert into tblneedy (FirstName,LastName,BirthDate,BloodGroup,Gender,Address,ContactNo,HospitalName,HospitalAdd,HospitalContactNo) values('$fn','$ln','$dob','$bg','$gen','$ad','$cno','$hn','$ha','$hc');";
		
		mysqli_query($con,$q) or die(mysqli_error($con));
}
	?>
</head>
</html>
<body>	

<form name="form1" method="post" action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <table width="318" border="0">
  <tr>
      <td width="188">FirstName</td>
      <td width="120"><label>
        <input type="text" name="FirstName" >
		<span class="error">* <?php echo $FirstNameErr; ?></span>
		<br><br>
      </label></td>
    </tr>
    <tr>
      <td>LastName</td>
      <td><label>
        <input type="text" name="LastName">
		<span class="error">* <?php echo $LastNameErr;?></span>
		<br><br>
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
        <input name="gender" type="radio" value="male" checked="checked">
      </label>
        Male
        <label>
        <input name="gender" type="radio" value="female">
        </label>
        Female <span class="error">* <?php echo $genderErr;?></span>
	<br><br>
	</td>
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
      <input type="text" name="ContactNo">
	  <span class="error">* <?php echo $ContactNoErr;?></span>
<br><br>
	</label></td>
	</tr>
    <tr>
      <td>HospitalName</td>
      <td><label>
        <input type="text" name="txtHospitalName">
      </label></td>
    </tr>
    <tr>
      <td>HospitalAddress</td>
      <td><label>
        <input type="textarea" name="txtHospitalAdd">
      </label></td>
    </tr>
	<tr>
      <td>HospitalContactNo</td>
      <td><label>
        <input type="text" name="txtHospitalContactNo">
      </label></td>
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
