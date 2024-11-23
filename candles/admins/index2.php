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
    <title>Shopping</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
include("connectdb.php"); //เชื่อมต่อดาต้าเบส
$sql = "SELECT * FROM `admin` WHERE `a_id`='{$_SESSION['aid']}' ";
$rs = mysqli_query($conn, $sql) or die ("ค้นหาข้อมูลไม่สำเร็จ");
($data = mysqli_fetch_array($rs));
?>
    <nav>
        <div class="nav-container">
            <a href="index2.php">
                <div  class="nav-profile-house" style="cursor: pointer;">
                    <i class="fas fa-house"></i>
                </div>
            </a>
            <a href="index2.php">
                <img src="../imgs/logonav.png" style="width: 13vw; object-fit: contain;">
            </a>
            <div class="nav-profile">
                <div class="nav-profile">
                    <div onClick="window.location='Profile.php';" class="nav-profile-login" style="cursor: pointer;">
                        <p class="nav-profile-login-name"><?=$data['a_user'];?></p>      
                    
                        <a href="logout.php">
                            <div class="nav-profile-login" style="cursor: pointer;">
                                <p class="nav-profile-login-name">LOGOUT</p>
                            </div>
                        </a>
                    </div>
                </div>
        </div>
    </nav>

    <div class="container">
        <div class="sidebar">
            <a onClick="window.location='order.php';" class="sidebar-items">
                จัดการออเดอร์
            </a>
            <a onClick="window.location='product.php';" class="sidebar-items">
                จัดการสินค้า
            </a>
            <a onClick="window.location='customer.php';" class="sidebar-items">
                จัดการข้อมูลลูกค้า
            </a>
            <a onClick="window.location='admin.php';" class="sidebar-items">
                จัดการข้อมูลแอดมิน
            </a>
            
            
        </div>
        <div>
            <MARQUEE style="font-size: 3vw;">!!!!ประกาศ!!! </MARQUEE> 
            <div id="productlist" class="product">
                <div class="product-items <?=$data['p_type'];?>">
                    <img class="product-img" src="../imgs/news.jpg" alt="">
                    <p style="font-size: 1.2vw;">แจ้งข่าวสำคัญ!!!!</p>
                </div>
                <div class="product-items <?=$data['p_type'];?>">
                    <img class="product-img" src="../imgs/sale.jpg" alt="">
                    <p style="font-size: 1.2vw;">บันทึกยอดขาย</p>
                </div>
                <div  class="product-items <?=$data['p_type'];?>">
                    <img class="product-img" src="../imgs/money.jpg" alt="">
                    <p style="font-size: 1.2vw;">บันทึกค่าใช่จ่าย</p>
                </div>
                <div  class="product-items <?=$data['p_type'];?>">
                    <img class="product-img" src="../imgs/stock.jpg" alt="">
                    <p style="font-size: 1.2vw;">ยอดสินค้าคงเหลือ</p>
                </div>
            </div>
        </div>
          
   
    
       


    
</body>
</html>