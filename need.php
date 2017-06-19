<?php include_once("conn.php"); ?>
<?php include_once("checkuser.php"); ?>

<html>
<head>
<?php
$bg="";
$cid="";

	if(isset($_REQUEST["Submit"]))
	{
	
		$uid=$_SESSION["loginid"];
		$bg=$_REQUEST["txtBloodGroup"];
		$hos=$_REQUEST["txtHospital"];
		$cno=$_REQUEST["txtContact"];
		$cid=$_REQUEST["txtCityId"];
		$whn=$_REQUEST["txtWhen"];
		$sts=$_REQUEST["txtStatus"];
		
		$q="insert into tblneed (NUserID,BloodGroup,Hospital,ContactNo,CityID,strWhen,Status) values('$uid','$bg','$hos','$cno','$cid','$whn','$sts');";
		
		mysqli_query($con,$q) or die(mysqli_error($con));
	
	$needid=mysqli_insert_id($con);
	$_SESSION["needid"]=$needid;	
		//header("location:profile.php");
	}
	?>
</head>
</html>
<body>

<form id="form1" name="form1" method="post" action="">
  <table width="307" border="0">
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
    
      <td>Hospital</td>
      <td><label>
        <input type="text" name="txtHospital" />
      </label></td>
    
      <td>Contact</td>
      <td><label>
        <input type="text" name="txtContact" />
      </label></td>
   
      <td>CityId</td>
      <td><label>
        <input type="text" name="txtCityId" />
      </label></td>
   
      <td>When</td>
      <td><label>
        <input type="date" name="txtWhen" />
      </label></td>
      <tr>
      <td>&nbsp;</td>
      <td><label>
        <td colspan="9"><center><input type="submit" name="Submit" value="Submit" /></center>
      </label></td>
	  </tr>
  </table>
</form>
</body>
</html>
<?php
$pg=1;
$pgsize=10;
$pgnation="";

	if(isset($_REQUEST["pg"]))
	{
		$pg=$_REQUEST["pg"];
		
	}
	$_SESSION["pg"]=$pg;
	if(isset($_REQUEST["SendRequest"]))
	{
	$id=$_REQUEST["del"];
	foreach($id as $i)
	{
	$needid=$_SESSION["needid"];
	$donorid =$i;
	
	$q="insert into tblsendrequest(needid,donorid,status) values($needid,$donorid,'Pending')";
	//echo $q;
	$qr=mysqli_query($con,$q) or die(mysqli_error($con));	
	}
	echo "Request Sent ";
	}
	
	

$where=" where 1=0 ";
if(isset($_REQUEST["Submit"]))
{
$where= " where BloodGroup ='".$bg. "' and City ='".$cid."'";
}


$q="Select count(*) as T1 from tbldonorreg ".$where;
$qr=mysqli_query($con,$q) or die(mysqli_error($con));
$res=mysqli_fetch_assoc($qr);
$cnt= $res["T1"];
$p=1;
	for($i=1;$i<=$cnt;$i+=$pgsize)
	{
	$pgnation.="<a href='need.php?pg=$p'>$p </a> | ";
	$p++;
	}

	$p=$_SESSION["pg"];
	$p= ($p-1)*$pgsize;
	$q="Select * from tbldonorreg ". $where. " limit $p,$pgsize";
	$qr=mysqli_query($con,$q) or die(mysqli_error($con));

	
?>

<form name="frm1">
<table border="1">
<tr>
	<th></th>
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
<td><input type="checkbox" name="del[]" value='<?php echo $did;?>'/></td>
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
<td><?php echo $res["Availability"]; ?></td>
</tr>
<?php } ?>
<tr>
<td colspan="13">
<?php echo $pgnation; ?>
</td>
</tr>
<tr><td colspan="13"><center><input type="submit" name="SendRequest" value="send request" /></center></td></tr>
</table>
</form>