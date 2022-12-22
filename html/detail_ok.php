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
$id= $_GET['id'];

$sql = "select  *  from pl where  id=".$id;
$rs = mysqli_query($conn,$sql);
$res = mysqli_fetch_assoc($rs);

$title=trim($_POST['title']);
$atime=date("Y-m-d H:i:s");
$uname = $_SESSION['name'];
$fname = $res['uname'];
$atitle = $res['title'];

$sql = "insert into title(`uname`,`fname`,`title`,`atitle`,`atime`,`pl_id`) values ('$name','$fname','$title','$atitle','$atime','$id')";

$num = $res['num'] +1;
$res_ok = mysqli_query($conn,$sql);

if($res_ok){
    $up_sql = "update pl  set num='$num' where id='$id'";
    mysqli_query($conn,$up_sql);
    echo "<script>alert('评论成功');window.location='detail.php?id=$id';</script>";
    exit();
}
else{
    echo "<script>alert('评论失败，请稍后重新尝试');window.location='detail.php?id=$id';</script>";
    exit();
}
?>