<?php session_start(); ?>
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
	
	$q="select * from tblLogin where UserName ='".$us."'";
	
	$qr=mysqli_query($con,$q) or die(mysqli_error($con));
	
	if($res=mysqli_fetch_assoc($qr))
	{
		$ps1= $res["Password"];
		echo "Founded Password $ps1";
			if($ps==$ps1)
			{
			$_SESSION["name"]= $us;
			$ut=$res["UserType"];
			$_SESSION["usertype"]=$ut;
					$lid=$res["LoginId"];
						
						$_SESSION["loginid"]=$lid;
					
					if($ut=="admin")
					{
					
						header("location:adminhome.php");
					}
					else if($ut=="user")
					{
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
<form id="form1" name="form1" method="post" action="">
<table width="241" border="0">
  <tr>
    <td width="143">User Name</td>
    <td width="88"><label>
      <input type="text" name="txtEmail" required="required"/>
    </label></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><label>
      <input type="password" name="txtPassword" required="required"/>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      
        <input type="submit" name="Submit" value="Submit" />
      
    </td>
  </tr>
  <tr>
	<td colspan="2"><?php echo $msg; ?></td>
	</tr>
</table>

<p><a href="usereg.php"> user registration</a></p>
</form>
</body>
</html>
