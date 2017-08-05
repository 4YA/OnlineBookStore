<style>
h1{style = 'font-family:微軟正黑體';}
</style>
<?php
	include "db_conn.php";
	
	$StudentID = $_POST["StudentID"];
	$Password = $_POST["Password"];
	$query = "SELECT * FROM members";
	session_start();
	$num = 1;
	if($stmt = $db->query($query))
		while($result=mysqli_fetch_object($stmt))
		{
			if(!strcmp($result->StudentID,$StudentID) && !strcmp($result->Password,$Password))
			{
					$query2 = "SELECT Name FROM members WHERE StudentID = ?";
					if($result2 = $db->prepare($query2)){
						$result2->bind_param("s", $StudentID);
						$result2->execute();
						$result2->bind_result($Name);
						while($result2->fetch())
						$_SESSION['username'] = $Name;
					}
				echo "<h1>登入成功!</h1>";
				
				$num -= 1;
				header("Refresh: 1; url=Main.php");
			}
		}
	if($num == 1)
	{
		echo "<h1>查無此帳號!!</h1>";	
		header("Refresh: 1; url=login.php");
	}


?>