<?php
$localhost = 'localhost';
$user = 'root';
$password = '';
$database = 'onlinebookstore';
 //進行連線
$db = mysqli_connect($localhost, $user, $password, $database);
if (mysqli_connect_errno()) {
echo "Connect ERROR!";
exit();
}
mysqli_set_charset($db,"utf8");//設定編碼
//mysqli_close()//斷掉連接
?> 
