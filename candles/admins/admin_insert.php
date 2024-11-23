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
    <title>Insert ADMIN</title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
include("connectdb.php"); //เชื่อมต่อดาต้าเบส
$sql = "SELECT * FROM `admin` WHERE `a_id`='{$_SESSION['aid']}' ";
$rs = mysqli_query($conn, $sql) or die ("ค้นหาข้อมูลไม่สำเร็จ");
($data = mysqli_fetch_array($rs));
$id_user = $data['a_id'];
?>
  <div class="container">
    <div class="title">Insert ADMIN</div>
    <div class="content">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="aname"  required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="auser"  required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="aemail"  required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="aphone"  required>
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
          <input type="submit" name="Submit" value="Insert">
        </div>
        <div class="button">
          <input onClick="window.location='admin.php';" type="button" name="cancel" value="Cancel">
        </div>
      </form>
    </div>
  </div>

<?php
if(isset($_POST['Submit'])){
	
	$sql2 = "INSERT INTO `admin` (`a_id`, `a_name`, `a_user`, `a_email`, `a_phone`, `a_pass`) VALUES (NULL, '{$_POST['aname']}', '{$_POST['auser']}', '{$_POST['aemail']}','{$_POST['aphone']}', '{$_POST['apass']}');";
	mysqli_query($conn, $sql2) or die ("เพิ่มข้อมูลไม่สำเร็จ");
	$idd = mysqli_insert_id($conn);

  
	
	echo"<script>";
	echo"alert('เพิ่มข้อมูลสำเร็จ');";
	echo"window.location='admin.php';";
	echo"</script>";
	
}
?>
</body>
</html>