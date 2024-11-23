<?php
	include("connectdb.php");
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
    <nav>
    <div class="nav-container">
            <a href="index.php">
                <div  class="nav-profile-house" style="cursor: pointer;">
                    <i class="fas fa-house"></i>
                </div>
            </a>
            <a href="index.php">
                <img src="./imgs/logonav.png" style="width: 13vw; object-fit: contain;">
            </a>
            <div class="nav-profile">
                <div onClick="window.location='login.php';" class="nav-profile-login" style="cursor: pointer;">
                        <p class="nav-profile-login-name">Sign-in</p>
                        <i class="fas fa-right-to-bracket"></i>
                    </div>
                    <a href="register.php">
                        <div class="nav-profile-login" style="cursor: pointer;">
                            <p class="nav-profile-login-name">สมัครสมาชิก</p>
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </a>
                
                
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="sidebar">
            <form class="form-inline" action="index.php" method="post">


            <!-- Text input-->
            <div class="form-group">
                <input name="kw" id="txt_search" type="text" class="sidebar-search" placeholder="Search something...">
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">ค้นหา</button>
                </div>
            </div>
            </form><br>

            <a onClick="window.location='index.php';" class="sidebar-items">
                All products
            </a>

            <?php
                $sql2 = "select  *  from category ";
                $rs2 = mysqli_query($conn, $sql2) ;
                while ($data2 = mysqli_fetch_array($rs2, MYSQLI_BOTH)) {
            ?>
            <a onClick="window.location='index.php?pt=<?=$data2['cate_id'];?>';" class="sidebar-items">
                <?=$data2['cate_name'];?>
            </a>

            <?php } ?>

            
        </div>
        <div id="productlist" class="product">
        <?php
        include("connectdb.php");
	@$kw = $_POST['kw'] ;
	@$pt = $_GET['pt'] ;
	if (isset($_GET['pt'])) {
		$s = "and (p_type = '$pt')"; 
	} else {
		$s = "";	
	}
	$sql = "select * from products where ( p_name like '%$kw%' or p_detail like '%$kw%' ) $s ";
	$rs = mysqli_query($conn, $sql) ;
	$i = 0;
	while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
	
?>
        <div onClick="window.location='detail_1.php?id=<?=$data['p_id'];?>';" class="product-items <?=$data['p_type'];?>">
            <img class="product-img" src="./imgs/<?=$data['p_img'];?>" alt="">
            <p style="font-size: 1.2vw;"><?=$data['p_name'];?></p>
            <p stlye="font-size: 1vw;"><?=$data['p_price'];?> THB</p>
        </div>
<?php        
}
mysqli_close($conn); //ปิดการเชื่อมต่อ db
?>


    
</body>
</html>