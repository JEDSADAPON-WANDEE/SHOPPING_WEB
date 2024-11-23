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
    <title>Edit</title>
    <link rel="stylesheet" href="index.css">

    <style>
        .custom-textbox{
            width: 300px;
            height: 40px;
        }
    </style>

</head>
<body>
<!-- SELECT * FROM `products` ORDER BY `p_id` ASC -->
<?php
include("connectdb.php");
$sql = "SELECT * FROM `products` WHERE `p_id`='{$_GET['id']}'";
$rs = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($rs);
?>
<div id="modalDesc" class="modal" style="display: flex;">
        <div onclick="closeModal()" class="modal-bg"></div>
        <div class="modal-page">
            <h2>Edit</h2>
            <br>
            <div class="modaldesc-content">
                <div class="modaldesc-detail">
                <p style="font-size: 1.2vw;">product NO: <?=$data['p_id'];?></p>
                    <!-- <p id="mdd-price" style="font-size: 1.2vw;">Price <?=$data['p_price'];?> THB</p> -->
                    <!-- <p id="mdd-price" style="font-size: 1.2vw;">Shipping 50 THB</p> -->
                    <!-- <?php
                    $product = $data['p_name'];
                    $price = $data['p_price'];
                    $ship = 50;
                    $total = $price + $ship;
                    ?> -->
                    <!-- <p id="mdd-price" style="font-size: 1.2vw;">Total <?=$data['o_total'];?> THB</p> -->
                    <form method="post" action="" enctype="multipart/form-data">
                        <p id="mdd-price" style="font-size: 1.2vw;">Name</p>
                        <input type="text" name="pname" class="custom-textbox" autofocus required>

                        <p id="mdd-price" style="font-size: 1.2vw;">price</p>
                        <input type="text" name="pprice" class="custom-textbox" autofocus required>

                        <p id="mdd-price" style="font-size: 1.2vw;">Detail</p>
                        <textarea name="pdetail" cols="70" rows="6"></textarea><br>
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
	
	
//   $sql = "UPDATE `products` SET `p_name`='{$_POST['pname']}', `p_price`='{$_POST['pprice']}',`p_detail`='{$_POST['pdetail']}' WHERE  `p_id`='{$data['p_id']}';";
  $sql = "UPDATE `products` SET `p_name`='{$_POST['pname']}', `p_price`='{$_POST['pprice']}',`p_detail`='{$_POST['pdetail']}' WHERE `products`.`p_id` = '{$data['p_id']}';";
	mysqli_query($conn, $sql) or die ("แก้ไขสินค้าไม่สำเร็จ");
	
	
	echo"<script>";
	echo"alert('แก้ไขสินค้าสำเร็จ');";
	echo"window.location='product.php';";
	echo"</script>";
	
}
?>

</body>
</html>