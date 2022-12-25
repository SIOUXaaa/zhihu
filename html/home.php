<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>用户主页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="fly">
    <meta name="description" content="Fly">
    <link rel="stylesheet" href="../res/layui/css/layui.css">
    <link rel="stylesheet" href="../res/css/global.css">
    
</head>

<body style="margin-top: 65px;">
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
    ?>
    <div class="fly-header layui-bg-black">
        <div class="layui-container">
            <a class="fly-logo" href="index.php">
                <img src="../res/images/igotyou.png" alt="layui" style="height: 42px;">
            </a>
            <ul class="layui-nav fly-nav layui-hide-xs">
                <li class="layui-nav-item layui-this">
                    <a href="index.php"><i class="iconfont icon-jiaoliu"></i>首页</a>
                </li>


            </ul>

            <ul class="layui-nav fly-nav-user">
                <?php
                if (empty($_SESSION["name"])) {
                ?>
                    <li class="layui-nav-item">
                        <a class="iconfont icon-touxiang layui-hide-xs" href="home.php"></a>
                    </li>
                    <li class="layui-nav-item">
                        <a href="login.html">登录</a>
                    </li>
                    <li class="layui-nav-item">
                        <a href="reg.html">注册</a>
                    </li>
                <?php } else { ?>
                    <!-- 登录后的状态 -->
                    <li class="layui-nav-item">
                        <a class="iconfont layui-hide-xs" href="home.php">
                            <img src="https://cdn.imgcn.top/20201128/2b639c3f75008ab57834f8f85a2407cc.jpg" alt="延疑丁真" style="height:34px;border-radius:25px;">
                        </a>
                    </li>
                    <li class="layui-nav-item">
                        <a class="fly-nav-avatar" href="javascript:;">
                            <cite class="layui-hide-xs">
                                <?php echo $_SESSION['name'] ?>
                            </cite>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="my.php"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
                            <dd><a href="home.php"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a>
                            </dd>
                            <hr style="margin: 5px 0;">
                            <dd><a href="logout.php" style="text-align: center;">退出</a></dd>
                        </dl>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="fly-home fly-panel" style="background-image: url();">
        <img src="https://cdn.imgcn.top/20201128/2b639c3f75008ab57834f8f85a2407cc.jpg" alt="延疑丁真">
        <i class="iconfont icon-renzheng" title="子小口巴认证"></i>
        <h1>
            <?php echo $_SESSION['name'] ?>
            <i class="iconfont icon-nan"></i>
        </h1>

        <!-- <p style="padding: 10px 0; color: #5FB878;">认证信息：FLY 作者</p> -->

        <p class="fly-home-info">
            <i class="iconfont icon-kiss" title="飞吻"></i><span style="color: #FF7200;">电子烟，我只抽悦刻5代</span>
            <i class="iconfont icon-shijian"></i><span><?php echo $_SESSION['atime'] ?> 加入</span>
            <i class="iconfont icon-chengshi"></i><span>康巴上的汉子</span>
        </p>

        <p class="fly-home-sign">理想是一面旗帜，信念是一枚火炬。</p>

        <!-- <div class="fly-sns" data-user="">关注。未实现
           <a href="javascript:;" class="layui-btn layui-btn-primary fly-imActive" data-type="addFriend">关注</a>
         </div> -->

    </div>

    <div class="layui-container">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md6 fly-home-jie">
                <div class="fly-panel">
                    <h3 class="fly-panel-title"> <?php echo $_SESSION['name'] ?> 最近问了啥</h3>
                    <ul class="jie-row">
                        <?php
                        $sql1 = "select  *  from pl where uname='$name'";
                        // echo $sql1;
                        $rs1 = mysqli_query($conn, $sql1);
                        $rows = array();
                        while ($rs1 && $row = mysqli_fetch_assoc($rs1)) {
                            $rows[] = $row;
                        }
                        foreach ($rows as $res) {
                        ?>
                            <li>
                                <a href="detail.php?id=<?php echo $res['id'] ?>" class="jie-title"> <?php echo $res['title'] ?></a>
                                <i><?php echo $res['atime'] ?></i>
                                <em class="layui-hide-xs"><?php echo $res['num'] ?></em>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="layui-col-md6 fly-home-da">
                <div class="fly-panel">
                    <h3 class="fly-panel-title"><?php echo $_SESSION['name'] ?> 最近答了啥</h3>
                    <ul class="home-jieda">
                        <?php

                        $sql2 = "select  *  from title where fname='$name'";
                        $rs2 = mysqli_query($conn, $sql2);
                        $rows = array();

                        while ($rs2 && $row = mysqli_fetch_assoc($rs2)) {
                            $rows[] = $row;
                        }
                        foreach ($rows as $res) {
                        ?>
                            <li>
                                <p>
                                    <span><?php echo $res['atime'] ?></span>
                                    在<a href="detail.php?id=<?php echo $res['pl_id'] ?>" target="_blank"><?php echo $res['atitle'] ?></a>中回答：
                                </p>
                                <div class="home-dacontent">
                                    <?php echo $res['title'] ?>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="fly-footer">
        <p><a href="#" target="_blank">子小口巴</a> 2022 &copy; <a href="#" target="_blank">延疑丁真 出品</a></p>
    </div>
    <script src="../res/layui/layui.js"></script>
    <script>
        layui.cache.page = 'user';
        layui.cache.user = {
            username: '游客',
            uid: -1,
            avatar: '../res/images/avatar/00.jpg',
            experience: 83,
            sex: '男'
        };
        layui.config({
            version: "3.0.0",
            base: '../res/mods/'
        }).extend({
            fly: 'index'
        }).use(['fly', 'face'], function() {
            //解析文本，例如表情
            var $ = layui.$,
            fly = layui.fly;
            $('.home-dacontent').each(function() {
                var othis = $(this),
                    html = othis.html();
                othis.html(fly.content(html));
            });
        });
    </script>

</body>

</html>