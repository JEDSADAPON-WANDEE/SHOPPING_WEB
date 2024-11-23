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
	$sql ="DELETE FROM `orders` WHERE `o_id`='{$_GET['id']}' ";
	mysqli_query($conn,$sql) or die ("ลบข้อมูลออเดอร์ไม่ได้");
	
	
	echo"<script>";
	echo"alert('ลบข้อมูลออเดอร์สำเร็จ');";
	echo"window.location='order.php';";
	echo"</script>";
	
	
	}

?>