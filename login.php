
<html lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="http://kkbruce.tw/Content/AssetsBS3/img/favicon.ico">
		<title>login.php</title>
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="dist/css/starter-template.css" rel="stylesheet"> 
		
		<script src="\dist\js\bootstrap.js"></script>
		<script src="\dist\js\bootstrap.min.js"></script>
		<script src="\dist\js\npm.js"></script>
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
				<?php		
				session_start();			
				if(isset($_SESSION['username'])){
					?>
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
				}
				else
				{?>
					<a class="navbar-brand" href="Main.php">海大學生線上租借書籍系統</a>
					</div>
					<div id="navbar" class="collapse navbar-collapse">
				<?php
				}
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
		 <form action="search.php" method="post" class="form-horizontal" style = "margin:50px" onSubmit="return Check()" name="send">
		<div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1 register" style = "margin-top:20px">
            <div class="form-group">
              <label for="username" class="col-sm-3 control-label">學號:</label>
              <div class="col-sm-8">
                <div class="input-group">
                <input type="text" class="form-control" name="StudentID" required>
             </div>
            </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-3 control-label">密碼:</label>
              <div class="col-sm-8">
                <div class="input-group">
                <input type="password" class="form-control" name="Password" required>
              
             </div>
            </div>
            </div>
			</div>
			<div class="col-md-3 col-md-offset-3 col-xs-12">
			  <button type="reset" class="btn btn-default btn-block"><b>清空</b>
              <span class="glyphicon glyphicon-remove"></span></button>
			</div>
			<div class="col-md-3 col-xs-12">
			   <button type="submit" class="btn btn-info btn-block"><b>登入</b>
			   <span class="glyphicon glyphicon-arrow-right"></span></button>
			</div>
			</form>
		</div>
	</body>
</html>


