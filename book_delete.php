<?php
	
	include ("db_conn.php");
	
	
	
	$ISBN = isset($_GET['id']) ? $_GET['id'] : "";
	//echo "成功刪除 請稍等";
	$sql ="DELETE FROM books WHERE ISBN = '$ISBN'";
	mysqli_query($db,$sql);
	//$stmt = $db->prepare($sql);
	//$stmt->bind_param('s', $ISBN);
	//$stmt->execute();
	                                           
	
	//mysql_close($db);
	header("Refresh: 0; url=book_edit.php");
	
?>