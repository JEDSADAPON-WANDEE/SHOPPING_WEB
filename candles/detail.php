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
    <title>Detail_product</title>
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
                <img id="mdd-img" class="modaldesc-img" src="./imgs/<?=$data['p_img'];?>" alt="">
                <div class="modaldesc-detail">
                    <p id="mdd-name" style="font-size: 1.5vw;"><?=$data['p_name'];?></p>
                    <p id="mdd-price" style="font-size: 1.2vw;"><?=$data['p_price'];?> THB</p>
                    <br>
                    <p id="mdd-desc" style="color: #adadad;"><?=$data['p_detail'];?></p>
                    <br>
                    <div class="btn-control">
                        <button onClick="window.location='index2.php';" class="btn">
                            Close
                        </button>
                        <button onClick="window.location='basket.php?id=<?=$data['p_id'];?>';" class="btn btn-buy">
                            Buy it
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>