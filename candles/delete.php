<meta charset="utf-8">
<?php
	@session_start();
	
	$id2 = $_GET['id'] ;
	@$_SESSION['sitem'][$id2] -= 1;
	
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=basket.php\">";

?>