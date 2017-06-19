<?php session_start(); ?>
<?php include_once("conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="396" border="0">
    <tr>
      <td width="177">Enter City Name </td>
      <td width="209"><label>
        <input name="txtCityName" type="text" id="txtCityName" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Search" />
      </label></td>
    </tr>
	  </table>
</form>

<?php
$pg=1;
$pgsize=10;
$pgnation="";
	if(isset($_REQUEST["pg"]))
	{
		$pg=$_REQUEST["pg"];
		
	}
	$_SESSION["pg"]=$pg;


$where="";
if(isset($_REQUEST["Submit"]))
{
$where= " where City ='".$_REQUEST["txtCityName"]. "'";
}

$q="Select count(*) as T1 from tbldonorreg ".$where;
$qr=mysqli_query($con,$q) or die(mysqli_error($con));
$res=mysqli_fetch_assoc($qr);
$cnt= $res["T1"];
$p=1;
	for($i=1;$i<=$cnt;$i+=$pgsize)
	{
	$pgnation.="<a href='listdonor.php?pg=$p'>$p </a> | ";
	$p++;
	}

	$p=$_SESSION["pg"];
	$p= ($p-1)*$pgsize;
	$q="Select * from tbldonorreg ". $where. " limit $p,$pgsize";
	$qr=mysqli_query($con,$q) or die(mysqli_error($con));

	
?>

<body>
<table border="1">
<tr>
	<th>DonerID</th>
	<th>LoginID</th>
	<th>FirstName</th>
	<th>LastName</th>
	<th>BirthDate</th>
	<th>BloodGroup</th>
	<th>Gender</th>
	<th>Address</th>
	<th>City</th>
	<th>ContactNo</th>
	<th>ReportPath</th>
	<th>Availability</th>

</tr>
<?php
while($res=mysqli_fetch_assoc($qr)){
$did=$res["DonorID"];
?>
<tr>
<td><?php echo $res["DonorID"]; ?></td>
<td><?php echo $res["LoginID"]; ?></td>
<td><?php echo $res["FirstName"]; ?></td>
<td><?php echo $res["LastName"]; ?></td>
<td><?php echo $res["BirthDate"]; ?></td>
<td><?php echo $res["BloodGroup"]; ?></td>
<td><?php echo $res["Gender"]; ?></td>
<td><?php echo $res["Address"]; ?></td>
<td><?php echo $res["City"]; ?></td>
<td><?php echo $res["ContactNo"]; ?></td>
<td><?php echo $res["ReportPath"]; ?></td>
<td><?php echo $res["Availabilty"]; ?></td>

</tr>
<?php } ?>
<tr>
<td colspan="13">
<?php echo $pgnation; ?>
</td>
</tr>
</table>
</body>
</html>
