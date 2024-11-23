<?php  //คำสั่งการล็อก
session_start();
if(empty($_SESSION['aid'])){  
	echo"Access Denied !!!";
	exit;
}
?>

<meta charset="utf-8">
<?php
if(isset($_GET['id'])){
	include("connectdb.php");
	$sql ="DELETE FROM `admin` WHERE `a_id`='{$_GET['id']}' ";
	mysqli_query($conn,$sql) or die ("ลบข้อมูลadminไม่ได้");
	
	
	echo"<script>";
	echo"alert('ลบข้อมูลadminสำเร็จ');";
	echo"window.location='admin.php';";
	echo"</script>";
	
	
	}

?>