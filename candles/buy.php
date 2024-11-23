<?php  //คำสั่งการล็อก
session_start();
if(empty($_SESSION['cid'])){  
	echo"Access Denied !!!";
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php
include("connectdb.php");

$sql = "SELECT * FROM `products` WHERE `p_id`='{$_GET['id']}' ";
$rs = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($rs);
?>
<div id="modalDesc" class="modal" style="display: flex;">
        <div onclick="closeModal()" class="modal-bg"></div>
        <div class="modal-page">
            <h2>BuyDetail</h2>
            <br>
            <div class="modaldesc-content">
                <div class="modaldesc-detail">
                    <p id="mdd-name" style="font-size: 1.5vw;"><?=$data['p_name'];?></p>
                    <p id="mdd-price" style="font-size: 1.2vw;">Price <?=$data['p_price'];?> THB</p>
                    <p id="mdd-price" style="font-size: 1.2vw;">Shipping 50 THB</p>
                    <?php
                    $product = $data['p_name'];
                    $price = $data['p_price'];
                    $ship = 50;
                    $total = $price + $ship;
                    ?>
                    <p id="mdd-price" style="font-size: 1.2vw;">Total <?php echo $total ?> THB</p>
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
	
	
	$sql2 = "INSERT INTO `orders` (`o_id`, `o_product`, `o_price`, `o_ship`, `o_total`, `o_name`, `o_address`, `o_status`, `c_id` ) 
    VALUES (NULL, '$product', '$price', '$ship', '$total', '{$_POST['oname']}', '{$_POST['oaddress']}', 'Pending', '{$_SESSION['cid']}');";
	mysqli_query($conn, $sql2) or die ("สั่งซื้อสินค้าไม่สำเร็จ");
	$idd = mysqli_insert_id($conn);
	
	
	echo"<script>";
	echo"alert('สั่งซื้อสินค้าสำเร็จ');";
	echo"window.location='index2.php';";
	echo"</script>";
	
}
?>
</body>
</html>