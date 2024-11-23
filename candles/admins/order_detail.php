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
    <title>Order_detail</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php
include("connectdb.php");

$sql = "SELECT * FROM `orders` WHERE `o_id`='{$_GET['id']}' ";
$rs = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($rs);
$sql2 = "SELECT * FROM `customers` WHERE `c_id`='{$data['c_id']}' ";
$rs = mysqli_query($conn,$sql2);
$data2 = mysqli_fetch_array($rs);
?>
<div id="modalDesc" class="modal" style="display: flex;">
        <div onclick="closeModal()" class="modal-bg"></div>
        <div class="modal-page">
            <h2>Detail</h2>
            <br>
            
                <div class="modaldesc-content">
                    <div class="modaldesc-detail">
                        <p style="font-size: 1.2vw;">Order NO. <?=$data['o_id'];?></p>
                        <p stlye="font-size: 1vw;">User: NO.<?=$data['c_id'];?></p>
                        <p stlye="font-size: 1vw;">Total: <?=$data['o_total'];?> THB</p>
                        <p stlye="font-size: 1vw;">Status: <?=$data['o_status'];?></p>
                        <br>
                        <p stlye="font-size: 1vw;">Customer: <?=$data2['c_name'];?></p>
                        <p id="mdd-desc" style="color: #adadad;">Address: <?=$data2['c_address'];?></p>
                        <br>
                        <div class="btn-control">
                            <button onClick="history.back();" class="btn">
                                Close
                            </button>
                            <button onClick="window.location='order_edit.php?id=<?=$data['o_id'];?>';" class="btn btn-buy">
                                Edit
                            </button>
                            <button onClick="window.location='order_delete.php?id=<?=$data['o_id'];?>';" class="btn btn-buy">
                                Delete
                            </button>
                            <form method="post" action="" enctype="multipart/form-data">
                                <input class="btn btn-buy" type="submit" name="Submit" value="Success" >
                            </form>
                        </div>
                    </div>
                </div>
            
            
        </div>
    </div>
    <?php
if(isset($_POST['Submit'])){
	
	
  $sql = "UPDATE `orders` SET `o_status`='Success' WHERE `o_id`='{$data['o_id']}';";
	mysqli_query($conn, $sql) or die ("แก้ไขออเดอร์ไม่สำเร็จ");
	
	
	echo"<script>";
	echo"alert('แก้ไขสมาชิกสำเร็จ');";
	echo"window.location='order.php';";
	echo"</script>";
	
}
?>

</body>
</html>