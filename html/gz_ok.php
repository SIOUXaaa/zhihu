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
if(empty($name)){
    echo "<script>alert('请登录才能关注');window.location='login.html';</script>";
    exit();
}
$uid = $_SESSION['id'];
$id= $_GET['id'];

$sql1 = "select  *  from pl where  id=".$id;
$rs = mysqli_query($conn,$sql1);
$res = mysqli_fetch_assoc($rs);

$fname=trim($res['uname']);
$atime=date("Y-m-d H:i:s");

$sql2 = "select  *  from gz where  uname='$name' and fname='$fname'";
$rs2 = mysqli_query($conn,$sql2);
$res2 = mysqli_fetch_assoc($rs2);
if(!empty($res2)){
    echo "<script>alert('已经关注了');window.location='index.php';</script>";
    exit();
}



$sql = "insert into gz(`uname`,`fname`,`atime`) values ('$name','$fname','$atime')";

$res_ok = mysqli_query($conn,$sql);

if($res_ok){
    echo "<script>alert('关注成功');window.location='index.php';</script>";
    exit();
}
else{
    echo "<script>alert('关注失败，请稍后重新尝试');window.location='index.php';</script>";
    exit();
}
?>