<?php
session_start();

//session_destroy();

unset($_SESSION['cid']);
unset($_SESSION['cname']);

 echo "<script>";
 echo "window.location='index.php';";
 echo "</script>";
?>