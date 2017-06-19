<?php session_start(); ?>
<?php include_once("conn.php"); ?>
<html>
<head>

<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>

<script src="js/jquery-1.4.min.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>

	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
		});

		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>
	
	<?php

	$msg="";
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
		$q="insert into tblLogin (Username,Password,UserType)
		values('$un','$ps','$ut');";
		
		mysqli_query($con,$q) or die(mysqli_error($con));
		
		header("location:signin.php");
	}
	?>
</head>
<body>
<form name="form1" method="post" action="">
  <table width="336" border="0">
    <tr>
      <td width="190">Username</td>
      <td width="136"><label>
        <input type="text" name="txtUserName" id="txtUserName" class="validate[required,[username]] text-input">
      </label></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label>
        <input type="password" name="txtPassword" id="txtPassword" class="validate[required]">
      </label></td>
    </tr>
    <tr>
      <td>Confirm Password </td>
      <td><label>
        <input type="password" name="txtCPassword" id="txtCPassword" class="validate[required]">
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit">
      </label></td>
    </tr>
  </table>
<p><p><a href="signin.php"> user login</a></p>

</form>
</body>
</html>