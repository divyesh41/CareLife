<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<?php 
if(!isset($_SESSION["loginid"])){
header("location:signin.php");
}
?>
</head>

<body>
<?php
$lid=$_SESSION["loginid"];
$q="select * from tblsendrequest where donorid in (select Donorid from tbldonorreg where LoginID =".$lid.")";

$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"bloodbank");

$qr=mysqli_query($con,$q) or die(mysqli_error($con));


while($res=mysqli_fetch_assoc($qr))
{

$nid =$res["needid"];
$q="select N.BloodGroup,N.Hospital,N.ContactNo,N.CityID,N.strWhen,U.UserName from tblneed N inner join tbllogin U on U.LoginID =N.NUserID  where N.SrNo =".$nid;

$qr1=mysqli_query($con,$q) or die(mysqli_error($con));
	if($res1=mysqli_fetch_assoc($qr1))
	{
	$sen= $res1["UserName"]. " Requires ". $res1["BloodGroup"]. " at ".$res1["Hospital"]." on ". $res1["strWhen"] . " Please Contact on ".$res1["ContactNo"];
	
	echo "<br/>".$sen;
	}



} 

?>
</body>
</html>
