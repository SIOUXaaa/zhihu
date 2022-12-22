
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>我的消息</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="keywords" content="fly,layui,前端社区">
  <meta name="description" content="Fly社区是模块化前端UI框架Layui的官网社区，致力于为web开发提供强劲动力">
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
    <li class="layui-nav-item layui-this">
      <a href="message.php">
        <i class="layui-icon">&#xe611;</i>
        我的消息
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
	  <div class="layui-tab layui-tab-brief" lay-filter="user" id="LAY_msg" style="margin-top: 15px;">
	    <div  id="LAY_minemsg" style="margin-top: 10px;">
        <!--<div class="fly-none">您暂时没有最新消息</div>-->
        <ul class="mine-msg">

            <?php
            $name = $_SESSION['name'];
            $sql1 = "select  *  from title where fname=".$name;
            $rs1 = mysqli_query($conn,$sql1);
            $rows = array();
            while($row = mysqli_fetch_assoc($rs1)){
                $rows[] = $row;
            }
            foreach ($rows as $res){
            ?>
          <li data-id="123">
            <blockquote class="layui-elem-quote">
              <a href="detail.php?id=<?php echo $res['pl_id']?>" target="_blank"><cite><?php echo $res['uname']?></cite></a>回答了您的求解<a target="_blank" href="detail.php?id=<?php echo $res['pl_id']?>"><cite><?php echo $res['title']?></cite></a>
            </blockquote>
            <p><span><?php echo $res['atime']?></span></p>
          </li>
            <?php }?>
        </ul>
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