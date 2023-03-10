<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>发表问题 编辑问题 公用</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="子小口巴">
    <meta name="description" content="子小口巴">
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
                <img src="../res/images/igotyou.png" alt="layui"  style="height: 50px;">
            </a>
            <ul class="layui-nav fly-nav layui-hide-xs">
                <li class="layui-nav-item layui-this">
                    <a href="index.php"><i class="iconfont icon-jiaoliu"></i>首页</a>
                </li>
                <li class="layui-nav-item">
                    <a href="gz.php"><i class="iconfont icon-iconmingxinganli"></i>我的关注</a>
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
                            <!--  -->
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

    <div class="layui-container fly-marginTop">
        <div class="fly-panel" pad20 style="padding-top: 5px;">
            <!--<div class="fly-none">没有权限</div>-->
            <div class="layui-form layui-form-pane">
                <div class="layui-tab layui-tab-brief" lay-filter="user">
                    <ul class="layui-tab-title">
                        <li class="layui-this">发表新帖
                            <!-- 编辑帖子 -->
                        </li>
                    </ul>
                    <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                        <div class="layui-tab-item layui-show">
                            <form action="add_ok.php" method="post">
                                <div class="layui-row layui-col-space15 layui-form-item">

                                    <div class="layui-col-md9">
                                        <label for="L_title" class="layui-form-label">标题</label>
                                        <div class="layui-input-block">
                                            <input type="text" id="L_title" name="title" required lay-verify="required" autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="layui-form-item layui-form-text">
                                    <div class="layui-input-block">
                                        <textarea id="L_content" name="content" required lay-verify="required" placeholder="详细描述" class="layui-textarea fly-editor" style="height: 260px;"></textarea>
                                    </div>
                                </div>


                                <div class="layui-form-item" style="text-align:center;">
                                    <button class="layui-btn layui-btn-radius" lay-filter="*" lay-submit>立即发布</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fly-footer">
        <p><a href="#" target="_blank">子小口巴</a> 2022 &copy; <a href="#" target="_blank">延疑丁真 出品</a></p>
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
        }).use('fly');
    </script>

</body>

</html>