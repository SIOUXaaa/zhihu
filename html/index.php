<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>社区交流</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="Fly社区">
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
    session_start(); //打开会话
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
                <li class="layui-nav-item">
                    <a href="gz.php"><i class="iconfont icon-iconmingxinganli"></i>关注</a>
                </li>
            </ul>

            <ul class="layui-nav fly-nav-user">
                <li class="layui-nav-item">
                    <a class="iconfont icon-touxiang layui-hide-xs" href="home.php"></a>
                </li>
                <?php
                if (empty($_SESSION["name"])) {
                ?>

                    <li class="layui-nav-item">
                        <a href="login.html">登入</a>
                    </li>
                    <li class="layui-nav-item">
                        <a href="reg.html">注册</a>
                    </li>
                <?php } else { ?>
                    <!-- 登入后的状态 -->
                    <li class="layui-nav-item">
                        <a class="fly-nav-avatar" href="javascript:;">
                            <cite class="layui-hide-xs">
                                <?php echo $_SESSION['name'] ?>
                            </cite>
                            <!-- <i class="iconfont icon-renzheng layui-hide-xs" title="认证信息：Lay 作者"></i> -->
                        </a>
                        <dl class="layui-nav-child">

                            <dd><a href="message.php"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
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

    <div class="fly-panel fly-column">
        <div class="layui-container">
            <ul class="layui-clear">
                <li class="layui-hide-xs layui-this"><a href="index.php">首页</a></li>

                <!-- 用户登入后显示 -->
                <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="my.php">我发表的贴</a></li>
                <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="mys.php">我收藏的贴</a></li>
                <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="gz.php">我的关注</a></li>
            </ul>

            <div class="fly-column-right layui-hide-xs">
                <a href="add.php" class="layui-btn layui-btn-radius">发表新帖</a>
            </div>
        </div>
    </div>

    <div class="layui-container">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md8">
                <div class="fly-panel">
                    <div class="fly-panel-title fly-filter">
                        <a>置顶</a>
                        <a href="#signin" class="layui-hide-sm layui-show-xs-block fly-right" id="LAY_goSignin" style="color: #FF5722;">去签到</a>
                    </div>
                    <ul class="fly-list">
                        <?php

                        $sql = "select  *  from pl order by id desc limit 1";
                        $rs = mysqli_query($conn, $sql);
                        $res = mysqli_fetch_assoc($rs);
                        ?>
                        <li>
                            <a href="my.php" class="fly-avatar">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                            </a>
                            <h2>
                                <a class="layui-badge">动态</a>
                                <a href="detail.php?id=<?php echo $res['id']; ?>">
                                    <?php echo $res['title'] ?>
                                </a>
                            </h2>
                            <div class="fly-list-info">
                                <a href="my.php" link>
                                    <cite>
                                        <?php echo $res['uname'] ?>
                                    </cite>
                                    <!-- <i class="iconfont icon-renzheng" title="xxx"></i> -->
                                </a>
                                <span>
                                    <?php echo $res['atime'] ?>
                                </span>


                                <span class="fly-list-nums">
                                    <i class="iconfont icon-pinglun1" title="回答"></i>
                                    <?php echo $res['num'] ?>
                                </span>
                            </div>
                            <div class="fly-list-badge">

                            </div>
                        </li>

                    </ul>
                </div>

                <div class="fly-panel" style="margin-bottom: 0;">

                    <ul class="fly-list">
                        <?php

                        $sql1 = "select  *  from pl";
                        $rs1 = mysqli_query($conn, $sql1);
                        $rows = array();
                        while ($row = mysqli_fetch_assoc($rs1)) {
                            $rows[] = $row;
                        }
                        foreach ($rows as $res) {
                        ?>
                            <li>
                                <a href="my.php" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">论坛</a>
                                    <a href="detail.php?id=<?php echo $res['id']; ?>">
                                        <?php echo $res['title'] ?>
                                    </a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="my.php" link>
                                        <cite>
                                            <?php echo $res['uname'] ?>
                                        </cite>

                                    </a>
                                    <span>
                                        <?php echo $res['atime'] ?>
                                    </span>


                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i>
                                        <?php echo $res['num'] ?>
                                    </span>
                                    <a href="sc.php?id=<?php echo $res['id'] ?>">
                                        <cite>收藏</cite>

                                    </a>
                                    <a href="gz_ok.php?id=<?php echo $res['id'] ?>">
                                        <cite>关注</cite>
                                    </a>
                                </div>
                                <div class="fly-list-badge">
                                </div>
                            </li>
                        <?php } ?>

                    </ul>
                    <div style="text-align: center">
                        <div class="laypage-main">
                            <a href="#" class="laypage-next">敬请期待</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="layui-col-md4">
<!-- //感觉没啥用
                <div class="fly-panel">

                </div>


                <div class="fly-panel fly-signin">

                </div>
//回帖榜，但是我没看到，好像是没实现的
                <div class="fly-panel fly-rank fly-rank-reply" id="LAY_replyRank">

                </div> -->

                <dl class="fly-panel fly-list-one">
                    <dt class="fly-panel-title">本周热议</dt>
                    <?php

                    $sql1 = "select  *  from pl";
                    $rs1 = mysqli_query($conn, $sql1);
                    $rows = array();
                    while ($row = mysqli_fetch_assoc($rs1)) {
                        $rows[] = $row;
                    }
                    foreach ($rows as $res) {
                    ?>
                        <dd>
                            <a href="detail.php?id=<?php echo $res['id']; ?>">
                                <?php echo $res['title'] ?>
                            </a>
                            <span><i class="iconfont icon-pinglun1"></i>
                                <?php echo $res['num'] ?>
                            </span>
                        </dd>

                    <?php } ?>

                </dl>



                <div class="fly-panel fly-link">
                    <h3 class="fly-panel-title">友情链接</h3>
                    <dl class="fly-panel-main">
                        <dd><a href="https://www.zhihu.com/signin?next=%2F" target="_blank">知乎</a>
                        <dd>
                        <dd><a href="https://m.weibo.cn/" target="_blank">微博</a>
                        <dd>
                        <dd><a href="https://www.dianping.com/citylist" target="_blank">大众点评</a>
                        <dd>
                        <dd><a href="https://www.huya.com/" target="_blank">虎牙</a>
                        <dd>
                        <dd><a href="#" class="fly-link">更多友链（敬请期待）</a>
                        <dd>
                    </dl>
                </div>

            </div>
        </div>
    </div>

    <div class="fly-footer">
        <p><a href="#" target="_blank">Fly社区</a> 2022 &copy; <a href="http://www.erdangjiade.com/" target="_blank">小超人
                出品</a></p>
    </div>

    <script src="../res/layui/layui.js"></script>
    <script>
        layui.cache.page = '';
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
        }).use('fly');
    </script>

    <!-- cnzz 流量统计网站，不知道有啥用，没啥影响
        <script type="text/javascript">
        var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        document.write(unescape("%3Cspan id='cnzz_stat_icon_30088308'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "w.cnzz.com/c.php%3Fid%3D30088308' type='text/javascript'%3E%3C/script%3E"));
    </script> -->

</body>

</html>