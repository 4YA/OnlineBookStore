<html lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="http://kkbruce.tw/Content/AssetsBS3/img/favicon.ico">
	<title>book_add.php</title>
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="dist/css/starter-template.css" rel="stylesheet"> 
		
		<script src="\dist\js\bootstrap.js"></script>
		<script src="\dist\js\bootstrap.min.js"></script>
		<script src="\dist\js\npm.js"></script>
		
		<script>
		function add()
		{
			document.getElementById("form1").action = "book_addsave.php";
			document.getElementById("form1").submit
		}
		</script>
</head>
		<body>
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container"><div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
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
							 <li><a href="#">你好 ! '.$_SESSION["username"].'</a></li>
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
		<div class="starter-template">
		<table class= "table table-hover">
			<form id="form1" name="form1" method="post" action="book_edit.php">
			<thead>
				<tr>
					<th>#</th>
					<th>ISBN</th>
					<th>作者</th>
					<th>類型</th>
					<th>書名</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="submit" value="點擊新增" class="btn btn-primary" onclick = "add()"></td>
					<td><input type="text" class="form-control" placeholder = "xxx-xxx-xxx-x" name="ISBN" id="ISBN" required></td>
					<td><input type="text" class="form-control" placeholder = "王小明" name="Author" id="Author" ></td>
					<td><input type="text" class="form-control" placeholder = "健康" name="Type" id="Type" ></td>
					<td><input type="text" class="form-control" placeholder = "吃得健康" name="Name" id="Name" ></td>
				</tr>
			</tbody>
			</form>
		</table>
		</div>
		</div>
</body>
</html>	