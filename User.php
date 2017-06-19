<?php ob_start(); ?>
<?php include_once("conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<?php
$msg="";
	if(isset($_REQUEST["Submit"]))
	{
	$us=$_REQUEST["txtEmail"];
	$ps=$_REQUEST["txtPassword"];
	
	$q="select * from tblLogin where Email ='".$us."'";
	
	$qr=mysqli_query($con,$q) or die(mysqli_error($con));
	
	if($res=mysqli_fetch_assoc($qr))
	{
		$ps1= $res["Password"];
		echo "Founded Password $ps1";
			if($ps==$ps1)
			{
					$ut=$res["UserType"];
					
					if($ut=="admin")
						header("location:adminhome.php");
					else if($ut=="User")
					{
					$lid=$res["LoginID"];
						
						$_SESSION["loginid"]=$lid;
						header("location:userhome.php");
					}
					
					else
						$msg="Invalid User Type";
			}
			else
			{
		$msg="Invalid Details";	
			}
	}
	else
	{
		$msg="Invalid Details";
	}
	
	
	}
?>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="352" border="0">
    <tr>
      <td width="205">First Name </td>
      <td width="137"><label>
        <input type="text" name="txtFirstName">
      </label></td>
    </tr>
    <tr>
      <td>Last Name </td>
      <td><label>
        <input type="text" name="txtLastName">
      </label></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><label>
        <input name="radiobutton" type="radio" value="radiobutton">
      </label>
      Male
      <label>
      <input name="radiobutton" type="radio" value="radiobutton">
      </label>
      Female</td>
    </tr>
    <tr>
      <td>Birthday</td>
      <td><label>
        <input type="date" name="txtBirthDate">
      </label></td>
    </tr>
    <tr>
      <td>BloodGroup</td>
      <td><label>
        <input type="text" name="txtBloodGroup">
      </label></td>
    </tr>
    <tr>
      <td>ContactNo</td>
      <td><label>
        <input type="text" name="txtContactNo">
      </label></td>
    </tr>
    <tr>
      <td>Type</td>
      <td><label>
        <input name="radiobutton" type="radio" value="radiobutton">
      </label>
        Donor
        <label> <br>
        <input name="radiobutton" type="radio" value="radiobutton">
        </label>
        NeedyUser</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit">
      </label></td>
    </tr>
  </table>
</form>
