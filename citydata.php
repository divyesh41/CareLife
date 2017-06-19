<?php include_once("checkuser.php"); ?>
<?php include_once("conn.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<?php
$msg="";

$cityid="";
$cityname="";

	if(isset($_REQUEST["editid"]))
	{
		$id=$_REQUEST["editid"];
		$q="select * from tblcity where CityID =".$id;
		
		$qr=mysqli_query($con,$q) or die(mysqli_error($con));
		if($res=mysqli_fetch_assoc($qr))
		{
		$cityid =$res["CityID"];
		$cityname=$res["CityName"];
		}
		
		
	}

	if(isset($_REQUEST["delbtn"]) && isset($_REQUEST["del"]))
	{
	$id=$_REQUEST["del"];
	foreach($id as $i)
	{
	$q="delete from tblcity where cityid =".$i;
	$qr=mysqli_query($con,$q) or die(mysqli_error($con));	
	}
	}

	if(isset($_REQUEST["Submit"]))
	{
		$ctid=$_REQUEST["cityid"];
		$ctname= $_REQUEST["txtCityName"];
		
		if($ctid !="")
		$q="update tblCity set CityName ='$ctname' where CityID =".$ctid;
		else
		$q="insert into tblCity(CityName) values ('".$ctname."')";
		
		mysqli_query($con,$q) or die(mysqli_error($con));
		$msg="Data Inserted";
	}
?>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="396" border="0">
    <tr>
      <td width="177">Enter City Name </td>
      <td width="209"><label>
 <input type="hidden" name ="cityid" value="<?php echo $cityid; ?>"/>
        <input name="txtCityName" type="text" id="txtCityName" value="<?php echo $cityname; ?>" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit" />
      </label></td>
    </tr>
	<tr>
		<td colspan="2"><?php echo $msg;?></td>
	</tr>
  </table>
</form>
<?php
$q="select * from tblCity";
$qr=mysqli_query($con,$q) or die(mysqli_error($con));
?>
<form>
<table border="1">
<tr>
	<th><input type="submit" name="delbtn" value="Delete"/></th>
	<th></th>
	<th>City ID</th>
	<th>City Name</th>
</tr>
<?php while($res =mysqli_fetch_assoc($qr)){ 
$did=$res["CityID"];

?>
<tr>
<td><input type="checkbox" value="<?php echo $did;?>" name="del[]"/></td>
<td><a href='citydata.php?editid=<?php echo $did;?>'>Edit</a></a></td>
	<td><?php echo $res["CityID"];?></td>
	<td><?php echo $res["CityName"]; ?></td>
</tr>
	
<?php } ?>
</table>
</form>
</body>
</html>
