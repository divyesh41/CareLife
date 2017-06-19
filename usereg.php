<?php session_start(); ?>
<?php include_once("conn.php"); ?>
<?php
	if(isset($_POST["Submit"]))
	{
		$un=trim($_POST["txtUserName"]);
		$ps=trim($_POST["txtPassword"]);
		$cps=trim($_POST["txtCPassword"]);
	
		$ut="user";
		
		if($un =="") {
		  $errorMsg=  "error : You did not enter a name.";
  			$code= "1" ;
		}
		
		
if(!empty($_POST["txtPassword"]) && ($_POST["txtPassword"] == $_POST["txtCPassword"])) {

	//$ps= test_input($_POST["txtPassword"]);
    //$cps= test_input($_POST["txtCPassword"]);

	
	if (strlen($_POST["txtPassword"]) <= '8') {
        $errorMsg= "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$ps)) {
        $errorMsg= "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$ps)) {
        $errorMsg= "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$ps)) {
        $errorMsg= "Your Password Must Contain At Least 1 Lowercase Letter!";
    } else {
        $errorMsg= "sucess";
    }

}
else{
	$errorMsg= "Password does not match";
	}
		
	$q="insert into tblLogin (Username,Password,UserType)values('$un','$ps','$ut');";
		
		$qr=mysqli_query($con,$q) or die(mysqli_error($con));
		$lid =mysqli_insert_id($con);
		header("Location:signin.php");
}


		?>
<html>
<body>

<?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?>


<form name="form1" method="POST" action="#">
  <table width="342" border="0">
   <tr>
      <td width="190">Username</td>
      <td width="136"><label>
        <input type="text" name="txtUserName" value="<?php if(isset($un)){echo $un		           ;} ?>"
		<?php if(isset($code) && $code == 1){echo "class=errorMsg" ;} ?> id="txtUserName" class="validate[required]">
      </label></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label>
        <input type="password" name="txtPassword" id="txtPassowrd" class="validate[required]">
      </label></td>
    </tr>
    <tr>
      <td>Confirm Password </td>
      <td><label>
        <input type="password" name="txtCPassword" id="txtCPassword" class="validate[required]">
      </label></td>
    </tr>
    <tr>
	</tr>
	<tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit">
      </label></td>
    </tr>
  </table>
	
	<p><p><a href="signin.php"> user login</a></p>
</p>
</form>

</body>
	</html>