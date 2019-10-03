<?php 
session_start();
session_destroy();
$_SESSION["pseudo"]="";
header("Location:index.php");
?>