<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Insert Product</title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Insert Product</div>
    <div class="content">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter product name" name="pname" required>
          </div>
          <div class="input-box">
            <span class="details">Price</span>
            <input type="text" placeholder="Enter your price" name="pprice" required>
          </div>
          <div class="input-box">
            <span class="details">Detail</span>
            <input type="text" placeholder="Enter your detail" name="pdetail" required>
          </div>
          <div class="input-box">
            <span class="details">Images</span>
            <input type="file" name="picture" required>
          </div>
          <div class="input-box">
            <span class="details">Category</span>
            <select name="cate">

              <?php
              include("connectdb.php"); //เชื่อมต่อฐานข้อมูล
              $sql = "SELECT * FROM `category`";
              $rs = mysqli_query($conn,$sql);
              while ($data = mysqli_fetch_array($rs)){
              ?>
                <option value="<?=$data['cate_id'];?>"><?=$data['cate_name'];?></option>
              <?php } ?>

            </select>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" name="Submit" value="Insert">
        </div>
      </form>
    </div>
  </div>

  <?php
if(isset($_POST['Submit'])){
	
	$allowed = array('gif', 'png', 'jpg', 'jpeg', 'jfif');
    $filename = $_FILES['picture']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        echo "<script>";
        echo "alert('บันทึกข้อมูลสินค้าไม่สำเร็จ! ไฟล์รูปต้องเป็น jpg gif หรือ png เท่านั้น');";
        echo "</script>";
        exit;
    }
	

	$sql2 = "INSERT INTO `products` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_img`, `p_type`) VALUES (NULL, '{$_POST['pname']}', '{$_POST['pdetail']}', '{$_POST['pprice']}', '{$ext}', '{$_POST['cate']}');";
	mysqli_query($conn, $sql2) or die ("เพิ่มข้อมูลสินค้าไม่ได้");
	$idd = mysqli_insert_id($conn);
	
	@copy ($_FILES['picture']['tmp_name'],"../imgs/".$idd.".".$ext);
	
  $img = $idd.".".$ext;
  $sql = "UPDATE `products` SET `p_img`='{$img}' WHERE `p_id`='{$idd}';";
  mysqli_query($conn, $sql) or die("แก้ไขข้อมูลสินค้าไม่ได้");

	echo"<script>";
	echo"alert('เพิ่มข้อมูลสินค้าสำเร็จ');";
	echo"window.location='product.php';";
	echo"</script>";
	
}
?>
</body>
</html>