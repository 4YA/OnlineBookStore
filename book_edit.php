<?php
	include"db_conn.php";
?>
<html lang="en">
	<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="http://kkbruce.tw/Content/AssetsBS3/img/favicon.ico">
	<title>book_edit.php</title>
		<link href="dist\css\bootstrap.min.css" rel="stylesheet">
		<link href="dist\css\starter-template.css" rel="stylesheet"> 
		
		<script src="\dist\js\bootstrap.js"></script>
		<script src="\dist\js\bootstrap.min.js"></script>
		<script src="\dist\js\npm.js"></script>
	<script>
	function add()
	{
		document.getElementById("bookform").action = "book_add.php";
		document.getElementById("bookform").submit();
	}
	</script>
	</head>
		<body>
		<form id = "bookform" method = "post" action = "edit.php">
			<input type="hidden" id="ISBN" name="ISBN" value="<?php echo isset($_POST["ISBN"])?$_POST["ISBN"]:""?>">
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
			<div class="container" style = "padding-top:20px;">
			<div class="col-md-offset-8">
				<form action="book_edit.php" class="search-form" method = "post">
					<div class="form-group has-feedback">
						<label for="search" class="sr-only">Search</label>
						<input type="text" class="form-control" name="key" id="key" placeholder="請輸入	ISBN / 作者 / 類型 / 書名 / 持有者">
						<span class="glyphicon glyphicon-search form-control-feedback"></span>
					</div>
				</form>
			</div>
				<input type = "button" value = "新增書籍" onclick = "add()" class = "btn btn-primary"><br><br>
				<table class= "table table-hover">
					<thead>
						<tr>
						<th>#</th>
						<th>ISBN</th>
						<th>作者</th>
						<th>類型</th>
						<th>書名</th>
						<th>持有者</th>
						<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (isset($_POST["key"]))
							{
								$keyword = $_POST["key"];
								
								$query = "SELECT * FROM books WHERE ISBN = ? or Author = ? or Type = ? or Name = ? or Holders = ?";
								if($stmt = $db->prepare($query)){
									$stmt->bind_param("sssss", $keyword, $keyword, $keyword, $keyword, $keyword);
									$stmt->execute();
									$stmt->bind_result($ISBN,$Author,$Type,$Name,$Holders);
									$count = 1;
									while($stmt->fetch()){
									if(!strcmp($Holders,$_SESSION['username']))
								{
									echo "<tr>";
									echo "<th>".$count."</th>";
									echo "<td>".$ISBN."</td>";
									echo "<td>".$Author."</td>";
									echo "<td>".$Type."</td>";
									echo "<td>".$Name."</td>";
									echo "<td>".$Holders."</td>";
									echo "<td><a href='book_update.php?id=".$ISBN."&id2=".$Author."&id3=".$Type."&id4=".$Name."'>
									<input type='button' class='btn btn-primary' onclick = 'bookUpdate()' value='修改'></a>
									<a href='book_delete.php?id=".$ISBN."'>
									<input style= 'margin-left : 10px' type='button' class='btn btn-danger' value='刪除'></a></td>";
									echo "</tr>";
									$count++;
								}
								else
								{
									echo "<tr>";
									echo "<th>".$count."</th>";
									echo "<td>".$ISBN."</td>";
									echo "<td>".$Author."</td>";
									echo "<td>".$Type."</td>";
									echo "<td>".$Name."</td>";
									echo "<td>".$Holders."</td><td></td>";
									$count++;
								}
									}
								}
							}
						else{
						$query2 = ("SELECT * FROM books");
						if($stmt = $db->query($query2)){
						$count = 1;
							while($result=mysqli_fetch_object($stmt))
							{
								if(!strcmp($result->Holders,$_SESSION['username']))
								{
									echo "<tr>";
									echo "<th>".$count."</th>";
									echo "<td>".$result->ISBN."</td>";
									echo "<td>".$result->Author."</td>";
									echo "<td>".$result->Type."</td>";
									echo "<td>".$result->Name."</td>";
									echo "<td>".$result->Holders."</td>";
									echo "<td><a href='book_update.php?id=".$result->ISBN."&id2=".$result->Author."&id3=".$result->Type."&id4=".$result->Name."'>
									<input type='button' class='btn btn-primary' onclick = 'bookUpdate()' value='修改'></a>
									<a href='book_delete.php?id=".$result->ISBN."'>
									<input style= 'margin-left : 10px' type='button' class='btn btn-danger' value='刪除'></td></a>";
									echo "</tr>";
									$count++;
								}
								else
								{
									echo "<tr>";
									echo "<th>".$count."</th>";
									echo "<td>".$result->ISBN."</td>";
									echo "<td>".$result->Author."</td>";
									echo "<td>".$result->Type."</td>";
									echo "<td>".$result->Name."</td>";
									echo "<td>".$result->Holders."</td>";
									echo "<td><a style = 'margin-left : 30px' href='book_checkIn.php?id=".$result->ISBN."&id2=".$result->Author."&id3=".$result->Type."&id4=".$result->Name."'>
									<input type='button' class='btn btn-success' onclick = 'checkIn()' value='借書'></td></a>";
									echo "</tr>";
									$count++;
								}
							}
						}	
						}
						?>
						</form>
					</tbody>
					</table>
		</div>
	</body>
</html>