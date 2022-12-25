<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>社区交流</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="孙吧">
    <meta name="description" content="孙吧">
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
                    <a class="iconfont icon-touxiang layui-hide-xs" href="index.php"></a>
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
                            <cite class="layui-hide-xs"><?php echo  $_SESSION['name'] ?></cite>

                        </a>
                        <dl class="layui-nav-child">

                            <dd><a href="my.php"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
                            <dd><a href="home.php"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a></dd>
                            <hr style="margin: 5px 0;">
                            <dd><a href="logout.php" style="text-align: center;">退出</a></dd>
                        </dl>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="layui-hide-xs">
        <div class="fly-panel fly-column">
            <div class="layui-container">
                <ul class="layui-clear">
                    <li class="layui-hide-xs layui-this"><a href="index.php">首页</a></li>

                    <!-- 用户登入后显示 -->
                    <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="my.php">我发表的贴</a></li>
                    <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="my.php#collection">我收藏的贴</a></li>
                    <li class="layui-hide-xs layui-hide-sm layui-show-md-inline-block"><a href="my.php#collection">我的关注</a></li>
                </ul>

                <div class="fly-column-right layui-hide-xs">
                    <a href="add.php" class="layui-btn layui-btn-radius layui-btn-normal">发表新帖</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    $id = $_GET['id'];
    $sql = "select  *  from pl where id=" . $id;
    $rs = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($rs);
    ?>
    <div class="layui-container">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md8 content detail">
                <div class="fly-panel detail-box">
                    <h1><?php echo $res['title'] ?></h1>
                    <div class="fly-detail-info">
                        <!-- <span class="layui-badge">审核中</span> -->
                        <span class="layui-badge layui-bg-green fly-detail-column">动态</span>
                        <span class="layui-badge layui-bg-red">精帖</span>


                        <span class="fly-list-nums">
                            <a href="#comment"><i class="iconfont" title="回答">&#xe60c;</i> <?php echo $res['num'] ?></a>

                        </span>
                    </div>
                    <div class="detail-about">
                        <a class="fly-avatar" href="home.php">
                            <img src="https://cdn.imgcn.top/20201128/2b639c3f75008ab57834f8f85a2407cc.jpg">
                        </a>
                        <div class="fly-detail-user">
                            <a href="home.php" class="fly-link">
                                <cite><?php echo $res['uname'] ?></cite>
                                <i class="iconfont icon-renzheng" title="#"></i>

                            </a>
                            <span><?php echo $res['atime'] ?></span>
                        </div>

                    </div>
                    <div class="detail-body photos">
                        <?php echo $res['content'] ?>
                    </div>
                </div>

                <div class="fly-panel detail-box" id="flyReply">
                    <fieldset class="layui-elem-field layui-field-title" style="text-align: center;">
                        <legend>回帖</legend>
                    </fieldset>

                    <ul class="jieda" id="jieda">

                        <?php

                        $sql1 = "select  *  from title where pl_id=" . $id;
                        $rs1 = mysqli_query($conn, $sql1);
                        $rows = array();
                        while ($row = mysqli_fetch_assoc($rs1)) {
                            $rows[] = $row;
                        }
                        foreach ($rows as $res) {
                        ?>
                            <li data-id="111">
                                <a name="item-1111111111"></a>
                                <div class="detail-about detail-about-reply">
                                    <a class="fly-avatar" href="">
                                        <img src="https://cdn.imgcn.top/20201128/2b639c3f75008ab57834f8f85a2407cc.jpg" alt=" ">
                                    </a>
                                    <div class="fly-detail-user">
                                        <a href="#" class="fly-link">
                                            <cite><?php echo $res['fname'] ?></cite>
                                        </a>
                                    </div>
                                    <div class="detail-hits">
                                        <span><?php echo $res['atime'] ?></span>
                                    </div>
                                </div>
                                <div class="detail-body jieda-body photos">
                                    <?php echo $res['title'] ?>
                                </div>
                                <div class="jieda-reply">
                                    <span class="jieda-zan" type="zan">
                                        <i class="iconfont icon-zan"></i>
                                        <em>0</em>
                                    </span>
                                    <span type="reply">
                                        <i class="iconfont icon-svgmoban53"></i>
                                        回复
                                    </span>
                                    <div class="jieda-admin">
                                        <span type="edit">编辑</span>
                                        <span type="del">删除</span>
                                        <span class="jieda-accept" type="accept">采纳</span>
                                    </div>
                            </li>
                        <?php } ?>

                    </ul>

                    <div class="layui-form layui-form-pane">
                        <form action="detail_ok.php?id=<?php echo $id ?>" method="post">
                            <div class="layui-form-item layui-form-text">
                                <a name="comment"></a>
                                <div class="layui-input-block">
                                    <textarea id="L_content" name="title" required lay-verify="required" placeholder="请输入内容" class="layui-textarea fly-editor" style="height: 150px;"></textarea>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <input type="hidden" name="jid" value="123">
                                <button class="layui-btn" lay-filter="*" lay-submit>提交回复</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="layui-col-md4">
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
                            <a href="detail.php?id=<?php echo  $res['id']; ?>"><?php echo $res['title'] ?></a>
                            <span><i class="iconfont icon-pinglun1"></i> <?php echo $res['num'] ?></span>
                        </dd>
                    <?php } ?>

                </dl>

            </div>
        </div>
    </div>

    <div class="fly-footer">
        <p><a href="#" target="_blank">孙吧</a> 2022 &copy; <a href="#" target="_blank">延疑丁真 出品</a></p>
    </div>

    <script src="../res/layui/layui.js"></script>
    <script>
        layui.cache.page = 'jie';
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
            var $ = layui.$,
                fly = layui.fly;
            //如果你是采用模版自带的编辑器，你需要开启以下语句来解析。

            $('.detail-body').each(function() {
                var othis = $(this),
                    html = othis.html();
                othis.html(fly.content(html));
            });

        });
    </script>

</body>

</html>