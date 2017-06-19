<?php
session_start();
ob_start();
if(!isset($_SESSION["name"]))
{
header("location:signin.php");
//echo "Check User Failed";
}
else if(!isset($_SESSION["loginid"]))
{
header("location:signin.php");
}
?>