<?php
	include "db_conn.php";
	
	$ISBN_BEFORE = isset($_GET['id']) ? $_GET['id'] : "";
	$ISBN = $_POST["ISBN"];
	$Author = $_POST["Author"];
	$Type = $_POST["Type"];
	$Name = $_POST["Name"];
	
	$sql = "UPDATE books SET ISBN = '$ISBN',Author = '$Author',Type = '$Type',Name = '$Name' WHERE ISBN = '$ISBN_BEFORE'";
	mysqli_query($db,$sql);
	//echo "修改成功 請稍後";
	header("Refresh: 0; url=book_edit.php");
?>