<?php  //คำสั่งการล็อก
session_start();
if(empty($_SESSION['aid'])){  
	echo"Access Denied !!!";
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php
include("connectdb.php");

$sql = "SELECT * FROM `customers` WHERE `c_id`='{$_GET['id']}' ";
$rs = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($rs);
?>
<div id="modalDesc" class="modal" style="display: flex;">
        <div onclick="closeModal()" class="modal-bg"></div>
        <div class="modal-page">
            <h2>Detail</h2>
            <br>
            
                <div class="modaldesc-content">
                    <div class="modaldesc-detail">
                        <p style="font-size: 1.2vw;">Customers NO.<?=$data['c_id'];?></p>
                        <p stlye="font-size: 1vw;">Name:<?=$data['c_name'];?></p>
                        <p stlye="font-size: 1vw;">User: <?=$data['c_user'];?></p>
                        <p stlye="font-size: 1vw;">Password: <?=$data['c_pass'];?></p>
                        <p stlye="font-size: 1vw;">Email: <?=$data['c_email'];?></p>
                        <p stlye="font-size: 1vw;">Tell: <?=$data['c_tell'];?></p>
                        <p stlye="font-size: 1vw;">BirthDate: <?=$data['c_birth'];?></p>
                        <p stlye="font-size: 1vw;">Address: <?=$data['c_address'];?></p>
                        <br>
                        <div class="btn-control">
                            <button onClick="history.back();" class="btn">
                                Close
                            </button>
                            <button onClick="window.location='customer_edit.php?id=<?=$data['c_id'];?>';" class="btn btn-buy">
                                Edit
                            </button>
                            <button onClick="window.location='customer_delete.php?id=<?=$data['c_id'];?>';" class="btn btn-buy">
                                Delete
                            </button>
                            
                        </div>
                    </div>
                </div>
            
            
        </div>
    </div>
    <?php
if(isset($_POST['Submit'])){
	
	
  $sql = "UPDATE `customers` SET `o_status`='Success' WHERE `c_id`='{$data['c_id']}';";
	mysqli_query($conn, $sql) or die ("แก้ไขออเดอร์ไม่สำเร็จ");
	
	
	echo"<script>";
	echo"alert('แก้ไขสมาชิกสำเร็จ');";
	echo"window.location='customers.php';";
	echo"</script>";
	
}
?>

</body>
</html>