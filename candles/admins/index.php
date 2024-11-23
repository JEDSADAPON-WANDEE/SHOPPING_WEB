<?php
session_start();
?>

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
    <div class="title">Login</div>
    <div class="content">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" name="cuser" required>
          </div>
          
          
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" name="cpass" required>
          </div>
          
        </div>
        
        <div class="button">
          <input type="submit" name="Submit" value="Login">
        </div>
    
      </form>
    </div>
  </div>

  

<?php
include("connectdb.php"); //เชื่อมต่อฐานข้อมูล
if(isset($_POST['Submit'])){
	
	$sql = "SELECT * FROM `admin` WHERE 
  `a_user`='{$_POST['cuser']}' AND 
  `a_pass`='{$_POST['cpass']}' LIMIT 1 ";
	$rs = mysqli_query($conn, $sql) or die ("select ไม่ได้");
	
  $num = mysqli_num_rows($rs);
  //var_dump($num); 
 
  if($num>0){
    $data = mysqli_fetch_array($rs);
    $_SESSION['aid'] = $data['a_id'];
    $_SESSION['aname'] = $data['a_name'];
    echo "<script>";
    echo "window.location='index2.php';";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('Username หรือ Password ไม่ถูกต้อง');";
    echo "</script>";
    exit;
}

	
}
?>
</body>
</html>