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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
include("connectdb.php"); //เชื่อมต่อดาต้าเบส
$sql = "SELECT * FROM `customers` WHERE `c_id`='{$_SESSION['cid']}' ";
$rs = mysqli_query($conn, $sql) or die ("ค้นหาข้อมูลไม่สำเร็จ");
($data = mysqli_fetch_array($rs));
$id_user = $data['c_id'];
?>
  <div class="container">
    <div class="title">Edit Profile</div>
    <div class="content">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="cname" value="<?=$data['c_name'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="cuser" value="<?=$data['c_user'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="cemail" value="<?=$data['c_email'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="ctell" value="<?=$data['c_tell'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Birth Date</span>
            <input type="date" name="cbirth" value="<?=$data['c_birth'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="cadd" value="<?=$data['c_address'];?>" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="cpass" required>
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
          <input onClick="window.location='Profile.php';" type="button" name="cancel" value="Cancel">
        </div>
      </form>
    </div>
  </div>

<?php
if(isset($_POST['Submit'])){
	
	
  $sql = "UPDATE `customers` SET `c_name`='{$_POST['cname']}', `c_user`='{$_POST['cuser']}', `c_email`='{$_POST['cemail']}', `c_tell`='{$_POST['ctell']}' , `c_pass`='{$_POST['cpass']}' , `c_birth`='{$_POST['cbirth']}' , `c_address`='{$_POST['cadd']}' WHERE `c_id`='{$_SESSION['cid']}';";
	mysqli_query($conn, $sql) or die ("แก้ไขสมาชิกไม่สำเร็จ");
	
	
	echo"<script>";
	echo"alert('แก้ไขสมาชิกสำเร็จ');";
	echo"window.location='Profile.php';";
	echo"</script>";
	
}
?>
</body>
</html>