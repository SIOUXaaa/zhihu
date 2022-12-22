<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>用户中心</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="fly">
  <meta name="description" content="Fly社区">
  <link rel="stylesheet" href="../res/layui/css/layui.css">
  <link rel="stylesheet" href="../res/css/global.css">
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
$name = $_SESSION['name'];
if(empty($name)){
  echo "<script>alert('请登录才能关注');window.location='login.html';</script>";
  exit();
}
?>
<div class="fly-header layui-bg-black">
  <div class="layui-container">
    <a class="fly-logo" href="index.php">
      <img src="../res/images/logo.png" alt="layui">
    </a>
    <ul class="layui-nav fly-nav layui-hide-xs">
      <li class="layui-nav-item layui-this">
        <a href="index.php"><i class="iconfont icon-jiaoliu"></i>首页</a>
      </li>

    </ul>
    
    <ul class="layui-nav fly-nav-user">
      <!-- 登入后的状态 -->
        <li class="layui-nav-item">
            <a class="iconfont icon-touxiang layui-hide-xs" href="index.php"></a>
        </li>
        <?php
        if(empty($_SESSION["name"])){
            ?>

            <li class="layui-nav-item">
                <a href="login.html">登入</a>
            </li>
            <li class="layui-nav-item">
                <a href="reg.html">注册</a>
            </li>
        <?php }else{ ?>
            <!-- 登入后的状态 -->
            <li class="layui-nav-item">
                <a class="fly-nav-avatar" href="javascript:;">
                    <cite class="layui-hide-xs"><?php echo  $_SESSION['name']?></cite>
                    <i class="iconfont icon-renzheng layui-hide-xs" title="认证信息：Lay 作者"></i>
                </a>
                <dl class="layui-nav-child">

                    <dd><a href="message.php"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
                    <dd><a href="home.php"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a></dd>
                    <hr style="margin: 5px 0;">
                    <dd><a href="logout.php" style="text-align: center;">退出</a></dd>
                </dl>
            </li>
        <?php } ?>

    </ul>
  </div>
</div>

<div class="layui-container fly-marginTop fly-user-main">
  <ul class="layui-nav layui-nav-tree layui-inline" lay-filter="user">
    <li class="layui-nav-item">
      <a href="home.php">
        <i class="layui-icon">&#xe609;</i>
        我的主页
      </a>
    </li>
    <li class="layui-nav-item">
      <a href="message.php">
        <i class="layui-icon">&#xe611;</i>
        我的消息
      </a>
    </li>
      <li class="layui-nav-item">
          <a href="mys.php">
              <i class="layui-icon">&#xe611;</i>
              我收藏的帖
          </a>
      </li>
      <li class="layui-nav-item">
          <a href="gz.php">
              <i class="layui-icon">&#xe611;</i>
              我的关注
          </a>
      </li>
  </ul>

  <div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
  </div>
  <div class="site-mobile-shade"></div>
  
  <div class="site-tree-mobile layui-hide">
    <i class="layui-icon">&#xe602;</i>
  </div>
  <div class="site-mobile-shade"></div>
  
  
  <div class="fly-panel fly-panel-user" pad20>
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title" id="LAY_mine">
          <?php

          $sql = "select  count(*) as number  from gz where uname='$name'";
          $rs = mysqli_query($conn,$sql);
          $res = mysqli_fetch_assoc($rs);

          ?>
        <li data-type="mine-jie" lay-id="index" class="layui-this">我关注了多少（<span><?php echo $res['number']?></span>）人</li>
      </ul>
      <div class="layui-tab-content" style="padding: 20px 0;">
        <div class="layui-tab-item layui-show">
          <ul class="mine-view jie-row">
              <?php

              $sql1 = "select  *  from gz where uname='$name'";
              $rs1 = mysqli_query($conn,$sql1);
              $rows = array();
              while($row = mysqli_fetch_assoc($rs1)){
                  $rows[] = $row;
              }
              foreach ($rows as $res){
              ?>
            <li>
              <a class="jie-title" href="#" target="_blank">我关注了<?php echo $res['fname']?></a>
              <i><?php echo $res['atime']?></i>
            </li>
              <?php }?>
          </ul>
          <div id="LAY_page"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="fly-footer">
    <p><a href="#" target="_blank">Fly社区</a> 2022 &copy; <a href="#" target="_blank">小超人 出品</a></p>
</div>

<script src="../res/layui/layui.js"></script>
<script>
layui.cache.page = 'user';
layui.cache.user = {
  username: '游客'
  ,uid: -1
  ,avatar: '../../res/images/avatar/00.jpg'
  ,experience: 83
  ,sex: '男'
};
layui.config({
  version: "3.0.0"
  ,base: '../../res/mods/'
}).extend({
  fly: 'index'
}).use('fly');
</script>

</body>
</html>