<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
session_destroy();
echo "<script>alert('ιεΊζε');window.location='index.php';</script>";
exit();
?>