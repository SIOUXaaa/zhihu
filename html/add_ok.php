<?php
header("Content-Type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "88888888";
$dbname = "zhihu";
session_start();  //打开会话
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(empty($_SESSION['name'])){
    echo "<script>alert('请登录才能发布帖子');window.location='login.html';</script>";
    exit();
}
$title=trim($_POST['title']);
$content=trim($_POST['content']);
$atime=date("Y-m-d H:i:s");
$uname = $_SESSION['name'];
$num=0;
$sql = "insert into pl(`title`,`content`,`atime`,`num`,`uname`) values ('$title','$content','$atime','$num','$uname')";


$res_ok = mysqli_query($conn,$sql);

if($res_ok){
    echo "<script>alert('发布成功');window.location='index.php';</script>";
    exit();
}
else{
    echo "<script>alert('发布失败，请稍后重新尝试');window.location='add.php';</script>";
    exit();
}
?>