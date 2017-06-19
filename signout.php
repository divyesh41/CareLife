
<?php
   session_start();
    //$_SESSION['name']=$name;
   unset($_SESSION["name"]);
   unset($_SESSION["usertype"]);
   unset($_SESSION["loginid"]);
   
   echo 'You have cleaned session';
   header('Refresh: 2; URL = signin.php');
?>