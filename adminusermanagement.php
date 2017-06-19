<?php session_start(); ?>
<?php include_once("conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<a href="donor.php">Add New Donner</a>
<a href="needyuser.php">Add New Needyuser</a>
<?php

//Select code for Edit
$fn="";
$dnid="";
$ln="";
$bth="";
$bg="";
$gn="";
$add="";
$ct="";
$cno="";
$mr="";
$id="";

if(isset($_REQUEST["editid"]))
{
$id=$_REQUEST["editid"];
$q="Select * from tbldonorreg where donorid=".$id;

$qr=mysqli_query($con,$q) or die(mysqli_error($con));

if($res=mysqli_fetch_assoc($qr))
{

$dnid=$res["DonorID"];
$fn=$res["FirstName"];
$ln=$res["LastName"];
$bth=$res["BirthDate"];
$bg=$res["BloodGroup"];
$gn=$res["Gender"];
$add=$res["Address"];
$ct=$res["City"];
$cno=$res["ContactNo"];
}

}


//Code Ends



$pg=1;
$pgsize=10;
$pgnation="";
	if(isset($_REQUEST["pg"]))
	{
		$pg=$_REQUEST["pg"];
		
	}
	$_SESSION["pg"]=$pg;
	if(isset($_REQUEST["delbtn"]))
	{
	$id=$_REQUEST["del"];
	foreach($id as $i)
	{
	$q="delete from tbldonorreg where donorid =".$i;
	$qr=mysqli_query($con,$q) or die(mysqli_error($con));	
	}
	}

	if(isset($_REQUEST["edtid"]))
	{
	$id=$_REQUEST["edtid"];
	$q="edit from tbldonorreg where donorid =".$id;
	$qr=mysqli_query($con,$q) or die(mysqli_error($con));	
	}


$q="Select count(*) as T1 from tbldonorreg";
$qr=mysqli_query($con,$q) or die(mysqli_error($con));
$res=mysqli_fetch_assoc($qr);
$cnt= $res["T1"];
$p=1;
	for($i=1;$i<=$cnt;$i+=$pgsize)
	{
	$pgnation.="<a href='adminusermanagement.php?pg=$p'>$p </a> | ";
	$p++;
	}

	$p=$_SESSION["pg"];
	$p= ($p-1)*$pgsize;
	$q="Select * from tbldonorreg limit $p,$pgsize";
	$qr=mysqli_query($con,$q) or die(mysqli_error($con));

	
?>
<?php
	if(isset($_REQUEST["Submit"]))
	{
		
		$id=$_REQUEST["txtDonorID"];
		$fn=$_REQUEST["txtFirstName"];
		$ln=$_REQUEST["txtLastName"];
		$bth=$_REQUEST["txtBirthday"];
		$bg=$_REQUEST["txtBloodGroup"];
		$ad=$_REQUEST["txtAddress"];
		$ct=$_REQUEST["txtCity"];
		$cno=$_REQUEST["txtContactNo"];
		
		
	$q="update  tbldonorreg set FirstName ='$fn', LastName='$ln', BirthDate ='$bth', BloodGroup='$bg', Address ='$ad',City ='$ct', ContactNo='$cno' where DonorID =$id";
		//echo $q;
		mysqli_query($con,$q) or die(mysqli_error($con));
		
		//header("location:profile.php");
	}
	?>
<body>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="318" border="0">
 <tr>
      <td width="190">DonorID</td>
      <td width="136"><label>
	  
		<input type="text" readonly="readonly" name="txtDonorID" value="<?php echo $dnid; ?>">
      </label></td>
    </tr>
    <tr>
      <td width="188">FirstName</td>
      <td width="120"><label>
        <input type="text" name="txtFirstName" value="<?php echo $fn; ?>">
      </label></td>
    </tr>
    <tr>
      <td>LastName</td>
      <td><label>
        <input type="text" name="txtLastName" value="<?php echo $ln; ?>">
      </label></td>
    </tr>
    <tr>
      <td>BirthDay</td>
      <td><label>
        <input type="date" name="txtBirthday" value="<?php echo $bth; ?>">
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
      <td>Address</td>
      <td><label>
        <textarea name="txtAddress"></textarea>
      </label></td>
    </tr>
	<tr>
	<td>City</td>
	<td><label>
	<input type="text" name="txtCity" value="<?php echo $ct; ?>">
	</label></td>
	</tr>
    <tr>
      <td>ContactNo</td>
      <td><label>
        <input type="text" name="txtContactNo" value="<?php echo $cno; ?>">
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit">
      </label></td>
    </tr>
  </table>
</form>

<form>
<table border="1">
<tr>
	<th><input type="Submit" value="Delete" name="delbtn"></th>
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
</tr>
<?php
while($res=mysqli_fetch_assoc($qr)){
$did=$res["DonorID"];
?>
<tr>
<td><input type="checkbox" value="<?php echo $did;?>" name="del[]"/></td>
<td><a href='adminusermanagement.php?editid=<?php echo $did;?>'>Edit</a></a></td>
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
</tr>
<?php } ?>
<tr>
<td colspan="13">
<?php echo $pgnation; ?>
</td>
</tr>
</table>
<p> Click here to clean <a href = "signout.php" title = "Logout">Session.
</p>

</form>
</body>
</html>
