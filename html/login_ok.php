<html>

<head>
    <link rel="stylesheet" href="../res/layui/css/layui.css">
    <link rel="stylesheet" href="../res/css/global.css">
    <script src="../res/layui/layui.js"></script>
</head>

<body>


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


    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $atime = date("Y-m-d H:i:s");
    $sql = "select * from user where name ='$name'";
    $rs = mysqli_query($conn, $sql);
    if (empty($rs)) {
        echo "<script>alert('无效的用户名和密码!请先注册后登录！');window.location='login.html';</>";
        exit();
    }
    $row = mysqli_fetch_array($rs);
    if ($row['pass'] != $pass) {
        echo "<script>alert('用户名,密码错误，请重新尝试！');window.location='login.html';</script>";
        exit();
    }
    $_SESSION["name"] = $name;
    $_SESSION["atime"] = $atime;
    $_SESSION["id"] = $row['id'];
    echo "
    <script>
    alert('登录成功,欢迎来到FIY社区！');window.location='index.php';
    // layui.use('layer',function(){
    //     var layer=layui.layer;
    //     layer.msg('登录成功,欢迎来到FIY社区！',{time:2000},window.location='index.php'); 
    // })
    </script>";
    exit();
    ?>

</body>

</html>