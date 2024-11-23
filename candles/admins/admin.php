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
    <title>ADMIN</title>
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
            <a onClick="window.location='admin_insert.php';" class="sidebar-items">
                Insert admin
            </a>
           
            
            
        </div>
        <div id="productlist" class="product">
<?php
$sql = "SELECT * FROM `admin` ORDER BY a_id DESC";
$rs = mysqli_query($conn, $sql);
while ($data = mysqli_fetch_array($rs)){
?>      
        <div onClick="window.location='admin_detail.php?id=<?=$data['a_id'];?>';" class="product-items">
            <p style="font-size: 1.2vw;">ADMIN No. <?=$data['a_id'];?></p>
            <p stlye="font-size: 1vw;">Name: <?=$data['a_name'];?></p>
            <p stlye="font-size: 1vw;">User: <?=$data['a_user'];?></p>
        </div>
        <?php        
}
mysqli_close($conn); //ปิดการเชื่อมต่อ db
?>


    
</body>
</html>