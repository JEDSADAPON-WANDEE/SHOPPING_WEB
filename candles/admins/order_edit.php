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
    <title>order_edit</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php
include("connectdb.php");

$sql = "SELECT * FROM `orders` WHERE `o_id`='{$_GET['id']}' ";
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
                    <p id="mdd-name" style="font-size: 1.5vw;">Order NO. <?=$data['o_id'];?></p>
                    <p id="mdd-price" style="font-size: 1.2vw;">Price <?=$data['o_price'];?> THB</p>
                    <p id="mdd-price" style="font-size: 1.2vw;">Shipping 50 THB</p>
                    <?php
                    $product = $data['p_name'];
                    $price = $data['p_price'];
                    $ship = 50;
                    $total = $price + $ship;
                    ?>
                    <p id="mdd-price" style="font-size: 1.2vw;">Total <?=$data['o_total'];?> THB</p>
                    <form method="post" action="" enctype="multipart/form-data">
                        <p id="mdd-price" style="font-size: 1.2vw;">Name</p>
                        <input type="text" name="oname" autofocus required>
                        <p id="mdd-price" style="font-size: 1.2vw;">Address</p>
                        <textarea name="oaddress" cols="70" rows="6"></textarea><br>
                        <div class="btn-control">
                            <button onClick="history.back();" class="btn">
                                Close
                            </button>
                            
                            <input class="btn btn-buy" type="submit" name="Submit" value="Confirm" >
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
include("connectdb.php"); //เชื่อมต่อฐานข้อมูล
if(isset($_POST['Submit'])){
	
	
  $sql = "UPDATE `orders` SET `o_name`='{$_POST['oname']}', `o_address`='{$_POST['oaddress']}' WHERE `o_id`='{$data['o_id']}';";
	mysqli_query($conn, $sql) or die ("แก้ไขออเดอร์ไม่สำเร็จ");
	
	
	echo"<script>";
	echo"alert('แก้ไขออเดอร์สำเร็จ');";
	echo"window.location='order.php';";
	echo"</script>";
	
}
?>
</body>
</html>