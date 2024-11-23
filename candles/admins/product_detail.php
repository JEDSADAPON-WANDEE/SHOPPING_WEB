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
    <title>Detail</title>
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
            <h2>Detail</h2>
            <br>
            
                <div class="modaldesc-content">
                    <div class="modaldesc-detail">
                        <p style="font-size: 1.2vw;">Product NO. <?=$data['p_id'];?></p>
                        <p stlye="font-size: 1vw;"> Name: <?=$data['p_name'];?></p>
                        <p stlye="font-size: 1vw;">Image: <?=$data['p_img'];?></p>
                        <p stlye="font-size: 1vw;">Price: <?=$data['p_price'];?></p>
                        <p stlye="font-size: 1vw;">Detail: <?=$data['p_detail'];?></p>
<?php
$sql = "SELECT * FROM `category` WHERE `cate_id`='{$data['p_type']}' ";
$rs = mysqli_query($conn,$sql);
$data2 = mysqli_fetch_array($rs);
?>
                        <p stlye="font-size: 1vw;">Type: <?=$data2['cate_name'];?></p>

                        <div class="btn-control">
                            <button onClick="window.location='product.php';" class="btn">
                                Close
                            </button>
                            <button onClick="window.location='product_edit.php?id=<?=$data['p_id'];?>';" class="btn btn-buy">
                                Edit
                            </button>
                            <button onClick="window.location='product_delete.php?id=<?=$data['p_id'];?>';" class="btn btn-buy">
                                Delete
                            </button>
                        
                        </div>
                    </div>
                </div>
            
            
        </div>
    </div>
    

</body>
</html>