<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>社区交流</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="子小口巴">
    <meta name="description" content="子小口巴">
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
    session_start(); //打开会话
    // 创建连接
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // 检测连接
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    <div class="fly-header layui-bg-black ">
        <div class="layui-container">
            <a class="fly-logo" href="index.php">
                <img src="../res/images/igotyou.png" alt="layui" style="height: 42px;">
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
                <!-- <li class="layui-nav-item">
                    <a class="iconfont icon-touxiang layui-hide-xs" href="home.php"></a>
                </li> -->
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
                            <!--  -->
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a href="my.php"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
                            <dd><a href="home.php"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>看看主页</a>
                            </dd>
                            <hr style="margin: 5px 0;">
                            <dd><a href="logout.php" style="text-align: center;">我先润了</a></dd>
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
                <?php if(!empty($_SESSION["name"])) { ?>
                 <!-- 用户登录后显示 -->
                 <span>|</span>
                <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="my.php">我的贴子</a></li>
                <span>|</span>
                <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="mys.php">我的收藏</a></li>
                <span>|</span>
                <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="gz.php">我的关注</a></li>
                <?php } ?>
            </ul>

            <div class="fly-column-right layui-hide-xs">
                <a href="add.php" class="layui-btn layui-btn-radius layui-btn-normal">水个贴先 ~</a>
            </div>
        </div>
    </div>

    <div class="layui-container">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md8">
                <div class="fly-panel">
                    <div class="fly-panel-title fly-filter">
                        <a>置顶</a>
                        <!-- <a href="#signin" class="layui-hide-sm layui-show-xs-block fly-right" id="LAY_goSignin" style="color: #FF5722;">去签到</a> -->
                    </div>
                    <ul class="fly-list">
                        <?php

                        $sql = "select  *  from pl order by id desc limit 1";
                        $rs = mysqli_query($conn, $sql);
                        $res = mysqli_fetch_assoc($rs);
                        ?>
                        <li>
                            <a href="my.php" class="fly-avatar">
                                <img src="https://cdn.imgcn.top/20201128/2b639c3f75008ab57834f8f85a2407cc.jpg" alt="延疑丁真">
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
                        while ($rs1 && $row = mysqli_fetch_assoc($rs1)) {
                            $rows[] = $row;
                        }
                        foreach ($rows as $res) {
                        ?>
                            <li>
                                <a href="my.php" class="fly-avatar">
                                    <img src="https://cdn.imgcn.top/20201128/2b639c3f75008ab57834f8f85a2407cc.jpg" alt="延疑丁真">
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
                            <a href="#" class="laypage-next">下面没有了捏，要不你写点？</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="layui-col-md4">

                <!-- <div class="fly-panel">

                </div>


                <div class="fly-panel fly-signin">

                </div>

                <div class="fly-panel fly-rank fly-rank-reply" id="LAY_replyRank">

                </div> -->

                <dl class="fly-panel fly-list-one">
                    <dt class="fly-panel-title">大伙在看啥？</dt>
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
                    <h3 class="fly-panel-title">赞助商（假）</h3>
                    <dl class="fly-panel-main">
                        <dd>
                            <a href="http://www.relx.fund/">RELX悦刻</a>
                        </dd>
                        <br>
                        <dd>
                            <a href="https://www.zhihu.com/signin?next=%2F" target="_blank">知乎（谢邀，人在美国，刚下飞机）</a>
                        </dd>
                        <br>
                        <dd>
                            <a href="https://m.weibo.cn/" target="_blank">微博</a>
                        </dd>
                        <br>
                        <dd>
                            <a href="https://www.dianping.com/citylist" target="_blank">大众点评</a>
                        </dd>
                        <br>
                        <dd>
                            <a href="https://www.huya.com/" target="_blank">虎牙</a>
                        </dd>
                        <br>
                        <dd>
                            <a href="https://www.xiaohongshu.com/explore">小红书</a>
                        </dd>
                        <br>
                        <dd><a href="#" class="fly-link">来点赞助好嘛？</a>
                        </dd>
                        
                    </dl>
                </div>

            </div>
        </div>
    </div>

    <div class="fly-footer">
        <p><a href="#" target="_blank">子小口巴</a> 2022 &copy; <a href="#" target="_blank">延疑丁真
                出品</a></p>
    </div>


    <script>
        layui.use('element',function(){
            var element=layui.element;
        })
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


</body>

</html>