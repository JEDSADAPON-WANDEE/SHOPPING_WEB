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
	$sql ="DELETE FROM `products` WHERE `p_id`='{$_GET['id']}' ";
	mysqli_query($conn,$sql) or die ("ลบข้อมูลสินค้าไม่ได้");
	
	
	echo"<script>";
	echo"alert('ลบข้อมูลสินค้าสำเร็จ');";
	echo"window.location='product.php';";
	echo"</script>";
	
	
	}

?>