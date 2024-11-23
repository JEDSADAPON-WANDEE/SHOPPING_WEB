<?php  //คำสั่งการล็อก
session_start();
if(empty($_SESSION['aid'])){  
	echo"Access Denied !!!";
	exit;
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Edit ADMIN</title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
include("connectdb.php"); //เชื่อมต่อดาต้าเบส
$sql = "SELECT * FROM `admin` WHERE `a_id`='{$_GET['id']}' ";
$rs = mysqli_query($conn, $sql) or die ("ค้นหาข้อมูลไม่สำเร็จ");
($data = mysqli_fetch_array($rs));
$id_user = $data['a_id'];
?>
  <div class="container">
    <div class="title">Edit Profile</div>
    <div class="content">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="aname" value="<?=$data['a_name'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="auser" value="<?=$data['a_user'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="aemail" value="<?=$data['a_email'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="aphone" value="<?=$data['a_phone'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="apass" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" required>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" name="Submit" value="Edit">
        </div>
        <div class="button">
          <input onClick="history.back();" type="button" name="cancel" value="Cancel">
        </div>
      </form>
    </div>
  </div>

<?php
if(isset($_POST['Submit'])){
	
	
  $sql = "UPDATE `admin` SET `a_name`='{$_POST['aname']}', `a_user`='{$_POST['auser']}', `a_email`='{$_POST['aemail']}', `a_phone`='{$_POST['aphone']}' , `a_pass`='{$_POST['apass']}' WHERE `a_id`='{$data['a_id']}';";
	mysqli_query($conn, $sql) or die ("แก้ไขข้อมูลไม่สำเร็จ");
	
	
	echo"<script>";
	echo"alert('แก้ไขข้อมูลสำเร็จ');";
	echo"window.location='admin.php';";
	echo"</script>";
	
}
?>
</body>
</html>