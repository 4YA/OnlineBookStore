<?php include "db_conn.php";?>
<html lang="en"> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="http://kkbruce.tw/Content/AssetsBS3/img/favicon.ico">
		<title>member.php</title>
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="dist/css/starter-template.css" rel="stylesheet"> 
		
		<script src="\dist\js\bootstrap.js"></script>
		<script src="\dist\js\bootstrap.min.js"></script>
		<script src="\dist\js\npm.js"></script>
		<body>
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar"> 
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
				</button> 
				<a class="navbar-brand" href="Main.php">海大學生線上租借書籍系統</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li>
						<a href="book.php">瀏覽書單</a>
					</li>
					<li>
						<a href="book_edit.php">編輯書單</a>
					</li>
					<li>
						<a href="member.php">會員資訊</a>
					</li>
				</ul>
				<?php
						
						session_start();
						if(isset($_SESSION['username']))
						{
							echo '<ul class="nav navbar-nav navbar-right">
							  <li><a href="myPage.php">你好 ! '.$_SESSION["username"].'</a></li>
							 <li><a href="logOut.php"><span class="glyphicon glyphicon-log-in"></span>登出</a></li></form>
							</ul>';
							
							
						}
						else
						{
							 echo '<ul class="nav navbar-nav navbar-right">;
							 <li><a href="signUp.php"><span class="glyphicon glyphicon-user"></span>註冊</a></li>
							 <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>登入</a></li>;
							</ul>';
							
						}
					?>
			</div>
			</div>
			</nav>
			<div class="container">
			<div class="col-md-offset-8">
				<form action="member.php" class="search-form" method = "post">
					<div class="form-group has-feedback">
						<label for="search" class="sr-only">Search</label>
						<input type="text" class="form-control" name="key" id="key" placeholder="請輸入 持有者">
						<span class="glyphicon glyphicon-search form-control-feedback"></span>
					</div>
				</form>
			</div>
				<div class="starter-template">
				<table class = "table table-hover">
					<thead>
						<tr>
						<th>學號</th>
						<th>名字</th>
						<th>電話號碼</th>
						<th>地址</th>
						<th>電子郵件</th>
						</tr>
					</thead>
				<?php 
				if (isset($_POST["key"]))
				{
					$keyword = $_POST["key"];
					
					$query = "SELECT StudentID, Name, Cellphone, Address, Email FROM members WHERE Name = ?";
					if($stmt = $db->prepare($query)){
						$stmt->bind_param("s", $keyword);
						$stmt->execute();
						$stmt->bind_result($StudentID,$Name,$Cellphone,$Address,$Email);
						while($stmt->fetch()){
							echo "<tr>";
							echo "<td>".$StudentID."</td>";
							echo "<td>".$Name."</td>";
							echo "<td>".$Cellphone."</td>";
							echo "<td>".$Address."</td>";
							echo "<td>".$Email."</td>";
							echo "</tr>";
						}
					}
				}
				else{
					$query2 = ("SELECT * FROM members");
					if($stmt = $db->query($query2)){
						while($result=mysqli_fetch_object($stmt))
						{
							echo "<tr>";
							echo "<td>".$result->StudentID."</td>";
							echo "<td>".$result->Name."</td>";
							echo "<td>".$result->Cellphone."</td>";
							echo "<td>".$result->Address."</td>";
							echo "<td>".$result->Email."</td>";
							echo "</tr>";
						}
					}
				}
				?>		
				<tbody>
				</tbody>
				</table>
				</div>	
			</div>
		</script>
	</body>
</html>