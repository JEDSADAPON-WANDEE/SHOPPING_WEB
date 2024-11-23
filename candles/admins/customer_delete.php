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
	$sql ="DELETE FROM `customers` WHERE `c_id`='{$_GET['id']}' ";
	mysqli_query($conn,$sql) or die ("ลบข้อมูลลูกค้าไม่ได้");
	
	
	echo"<script>";
	echo"alert('ลบข้อมูลลูกค้าสำเร็จ');";
	echo"window.location='customer.php';";
	echo"</script>";
	
	
	}

?>