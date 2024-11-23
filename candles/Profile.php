<?php  //คำสั่งการล็อก
session_start();
if(empty($_SESSION['cid'])){  
	echo"Access Denied !!!";
	exit;
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
include("connectdb.php"); //เชื่อมต่อดาต้าเบส
$sql = "SELECT * FROM `customers` WHERE `c_id`='{$_SESSION['cid']}' ";
$rs = mysqli_query($conn, $sql) or die ("ค้นหาข้อมูลไม่สำเร็จ");
($data = mysqli_fetch_array($rs));
?>
  <div class="container">
    <div class="title">Profile</div>
    <div class="content">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name:</span>
            <span class="details"><?=$data['c_name'];?></span>
          </div>
          <div class="input-box">
            <span class="details">Username:</span>
            <span class="details"><?=$data['c_user'];?></span>
          </div>
          <div class="input-box">
            <span class="details">Email:</span>
            <span class="details"><?=$data['c_email'];?></span>
          </div>
          <div class="input-box">
            <span class="details">Phone Number:</span>
            <span class="details"><?=$data['c_tell'];?></span>
          </div>
          <div class="input-box">
            <span class="details">Birth Date:</span>
            <span class="details"><?=$data['c_birth'];?></span>
          </div>
          <div class="input-box">
            <span class="details">Address:</span>
            <span class="details"><?=$data['c_address'];?></span>
          </div>
        </div>
        
        <div class="button">
          <input onClick="window.location='editprofile.php';" type="button" name="Edit" value="Edit">
        </div>
        <div class="button">
          <input onClick="window.location='index2.php';" type="button" name="cancel" value="Back">
        </div>
        
      </form>
    </div>
  </div>


</body>
</html>