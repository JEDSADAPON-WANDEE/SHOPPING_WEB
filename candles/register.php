<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
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
            <span class="details">Birth Date</span>
            <input type="Date" placeholder="Confirm your address" name="cbirth" required>
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
            <span class="details">Address</span>
            <input type="text" placeholder="Confirm your address" name="cadd" required>
          </div> 
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" name="cpass" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>
        </div>
        
        
        <div class="button">
          <input type="submit" name="Submit" value="Register">
        </div>
      </form>
    </div>
  </div>

<?php
include("connectdb.php"); //เชื่อมต่อฐานข้อมูล
if(isset($_POST['Submit'])){
	
	
	$sql2 = "INSERT INTO `customers` (`c_id`, `c_name`, `c_user`, `c_pass`, `c_email`, `c_tell`, `c_birth`, `c_address` ) VALUES (NULL, '{$_POST['cname']}', '{$_POST['cuser']}', '{$_POST['cpass']}', '{$_POST['cemail']}', '{$_POST['ctell']}', '{$_POST['cbirth']}', '{$_POST['cadd']}');";
	mysqli_query($conn, $sql2) or die ("สมัครสมาชิกไม่สำเร็จ");
	$idd = mysqli_insert_id($conn);
	
	
	echo"<script>";
	echo"alert('สมัครสมาชิกสำเร็จ');";
	echo"window.location='index.php';";
	echo"</script>";
	
}
?>
</body>
</html>