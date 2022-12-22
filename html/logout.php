<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
session_destroy();
echo "<script>alert('退出成功');window.location='index.php';</script>";
exit();
?>