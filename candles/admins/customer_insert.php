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
    <title>Insert Customers</title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Insert Customers</div>
    <div class="content">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="cname" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="cuser" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="cemail" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="ctell" required>
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
          <input type="submit" name="Submit" value="Insert">
        </div>
      </form>
    </div>
  </div>

<?php
include("connectdb.php"); //เชื่อมต่อฐานข้อมูล
if(isset($_POST['Submit'])){
	
	
	$sql2 = "INSERT INTO `customers` (`c_id`, `c_name`, `c_user`, `c_pass`, `c_email`, `c_tell` ) VALUES (NULL, '{$_POST['cname']}', '{$_POST['cuser']}', '{$_POST['cpass']}', '{$_POST['cemail']}', '{$_POST['ctell']}');";
	mysqli_query($conn, $sql2) or die ("เพิ่มสมาชิกไม่สำเร็จ");
	$idd = mysqli_insert_id($conn);
	
	
	echo"<script>";
	echo"alert('เพิ่มสมาชิกสำเร็จ');";
	echo"window.location='customer.php';";
	echo"</script>";
	
}
?>
</body>
</html>