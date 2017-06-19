<?php session_start(); ?>
<?php include_once("conn.php"); ?>
<html>
<head>
<script src="js/jquery-1.4.min.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
<script>
	$(document).ready(
	function(){
	$("#form1").validationEngine();
	}
	);
</script>
<link href="css/validationEngine.jquery.css" rel="stylesheet" />
	<?php
		$msg="";
		if(isset($_REQUEST["Submit"]))
		{
			
			$ot=$_REQUEST["txtOrgType"];
			$oname=$_REQUEST["txtOrgName"];
			$city=$_REQUEST["txtCity"];
			$add=$_REQUEST["txtAddress"];
			$cno=$_REQUEST["txtContactNo"];
			
			
	
	//	$q="insert into tbllogin (Email,Password,UserType) values('$uid','$ps','$ut');";
		
	//	mysqli_query($con,$q) or die(mysqli_error($con));
	
	
	$q="insert into tblOrganization (OrganizationType,OrgName,City,Address,ContactNo) values('$ot','$oname','$city','$add','$cno');";
		
		mysqli_query($con,$q) or die(mysqli_error($con));
		
		}
	?>
	</head>
	</html>
<form name="form1" id="form1" method="post" action="">
  <table width="345" border="0">
    <tr height="20"><tr>
	<tr>
      <td width="199">OrganizationType</td>
      <td width="136"><label>
        <select name="txtOrgType" id="txtOrgType" class="validate[required]">
        <option></option>
		<option> Hospital</option>
		<option>NGO</option>
		</select>
      </label></td>
    </tr>
    <tr>
      <td>Organization Name </td>
      <td><label>
        <input type="text" name="txtOrgName" id="txtOrgName" class="validate[required]">
      </label></td>
    </tr>
    <tr>
      <td>City</td>
      <td><label>
        <input type="text" name="txtCity" id="txtCity" class="validate[required]">
      </label></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label>
        <textarea name="txtAddress" id="txtAddress" class="validate[required]"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>Contact No </td>
      <td><label>
        <input type="text" name="txtContactNo" id="txtContactNo" class="validate[required]">
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
