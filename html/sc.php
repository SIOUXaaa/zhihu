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
$name = $_SESSION['name'];
$uid = $_SESSION['id'];
$id= $_GET['id'];
if(empty($name)){
    echo "<script>alert('请登录才能关注');window.location='login.html';</script>";
    exit();
}

$sql1 = "select  *  from pl where  id=".$id;
$rs1 = mysqli_query($conn,$sql1);
$res1 = mysqli_fetch_assoc($rs1);

$title=trim($res1['title']);
$atime=date("Y-m-d H:i:s");

$sql2 = "select  *  from sc where  uname='$name' and pl_id='$id'";
$rs2 = mysqli_query($conn,$sql2);
$res2 = mysqli_fetch_assoc($rs2);

if(!empty($res2)){
    echo "<script>alert('已经收藏了');window.location='index.php';</script>";
    exit();
}




$sql = "insert into sc(`pl_id`,`uid`,`pl_title`,`uname`,`atime`) values ('$id','$uid','$title','$name','$atime')";


$res_ok = mysqli_query($conn,$sql);

if($res_ok){

    echo "<script>alert('收藏成功');window.location='index.php';</script>";
    exit();
}
else{
    echo "<script>alert('收藏失败，请稍后重新尝试');window.location='index.php';</script>";
    exit();
}
?>