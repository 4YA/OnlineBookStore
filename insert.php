<style>
h1{style = 'font-family:微軟正黑體';}
</style>
<?php

	include "db_conn.php";
	
	$StudentID = $_POST["StudentID"];
	$Password = $_POST["Password"];
	$Password2 = $_POST["Password2"];
	$Name = $_POST["Name"];
	$Cellphone = $_POST["Cellphone"];
	$Email = $_POST["Email"];
	$Address = $_POST["Address"];
	$num = 1;
	if(strlen($Password)<6)
	{
		echo "<h1>密碼必須輸入6為以上!</h1>";
		//header("Location:signUp.php");
		header("Refresh: 2; url=signUp.php");
		$num -= 1;
	}
	else if($Password != $Password2)
	{
		echo "<h1>密碼驗證不相同!</h1>')";
		//header("Location:signUp.php");
		header("Refresh: 2; url=signUp.php");
		$num -= 1;
	}
	else
	{
		$query = ("SELECT StudentID FROM members");
		if($stmt = $db->query($query))
		{
			while($result=mysqli_fetch_object($stmt))
			{
				if($result->StudentID == $StudentID)
				{
					echo "<h1>此學號已被申請</h1>";
					header("Refresh: 2; url=signUp.php");
					$num -= 1;
				}	
			}
		}
		if($num == 1)
		{
			$query = ("insert into members values(?,?,?,?,?,?)");
			$stmt = $db->prepare($query);
			$stmt->bind_param("ssssss",$StudentID,$Name,$Cellphone,$Address,$Email,$Password);
			$stmt->execute();
			echo "<h1>註冊成功!</h1>";
			header("Refresh: 2; url=login.php");
		}
	}
?>