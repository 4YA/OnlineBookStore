<?php
	$conn = mysql_connect("127.0.0.1", "root","00000000") or die('Error with MySQL connection');
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db("onlinebookstore");
	session_start();
	
  if(isset($_POST[ISBN])){
	mysql_query("insert into Books value('$_POST[ISBN]','$_POST[Author]','$_POST[Type]','$_POST[Name]','$_SESSION[username]')");
	header("Location: book_edit.php"); 
  }
?>