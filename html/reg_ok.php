<?php
header("Content-Type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "88888888";
$dbname = "zhihu";

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$name = $_POST["username"];
$pass = $_POST["password"];
$apass = $_POST["apass"];
$atime = date("Y-m-d H:i:s");
// if($pass !=$apass){
//     echo "<script>alert('2次密码不一致，请重新输入');window.location='reg.html';</script>";
//     exit();
// }
if(strlen($pass)<8||strlen($pass)>20){
    echo "<scipt>";
}
$sql = "select * from user where name='$name'";

$rs = mysqli_query($conn,$sql);
$res = mysqli_fetch_array($rs);

if(empty($res)){
    $sql = "insert into user(`name`,`pass`,`atime`) values ('$name','$pass','$atime')";
    $res_ok = mysqli_query($conn,$sql);

    if($res_ok){
        echo "<script>alert('注册成功,前去登录');window.location='login.html';</script>";
        exit();
    }
    else{
        echo "<script>alert('注册失败，请稍后重新尝试');window.location='reg.html';</script>";
        exit();
    }
}else{
    echo "<script>alert('用户名" . $name . "已经被注册，请更换用户名重新注册！');window.location='reg.html';</script>";
    exit();
}



?>