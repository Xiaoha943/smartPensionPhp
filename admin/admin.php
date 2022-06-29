<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台</title>
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <!--[if lt IE 9]>
        <script src="./css/bootstrap/html5shiv.min.js"></script>
        <script src="./css/bootstrap/respond.min.js"></script>
    <![endif]-->
    <style>
        .content-box-bottom {
            position: fixed;
            width: 100%;
            top: 50px;
            left: 0px;
            bottom: 0px;
        }

        .left-box {
            border-right: 1px solid lightgray;
        }

        .left-box,
        .right-box {
            height: 100%;
            padding: 0;
        }

        .left-box .panel {
            text-align: center;
            margin-bottom: 0;
        }

        .left-box .panel-title {
            font-weight: bold;
            font-size: 18px;
        }

        .left-box .panel-body {
            padding: 0;
        }

        .left-box .list-group {
            margin-bottom: 0;
        }

        .mainFrame {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">后台管理系统</a>
                <button type="button" class="navbar-toggle" data-target="#navbar-collapse-box-1" data-toggle="collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar-collapse-box-1" class="navbar-collapse collapse">
                <ul class="navbar-nav nav navbar-right">
                    <li><a href="#">欢迎登陆：<span class="text-danger" style="font-weight: bold;">管理员</span></a></li>
                    <li><a href="../main.php">进入首页</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content-box-bottom container-fluid">
        <div class="row" style="height: 100%;">
            <div class="col-sm-2 left-box" id="menu-group">
                <!-- 第一个菜单 -->
                <div class="panel panel-default">
                    <div class="panel-heading" data-target="#stuManager" data-toggle="collapse" data-parent="#menu-group">
                        <div class="panel-title">
                            用户管理
                        </div>
                    </div>
                    <div id="stuManager" class="collapse panel-collapse ">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="../admin/add/adduser.php" target="mainFrame">新增用户信息</a></li>
                                <li class="list-group-item"><a href="../admin/delete/deleteuser.php" target="mainFrame">删除用户信息</a></li>
                                <li class="list-group-item"><a href="../admin/update/updateuser.php" target="mainFrame">更新用户信息</a></li>
                                <li class="list-group-item"><a href="../admin/select/selectuser.php" target="mainFrame">查看用户信息</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- 第二个菜单 -->
                <div class="panel panel-default">
                    <div class="panel-heading" data-target="#examManager" data-toggle="collapse" data-parent="#menu-group">
                        <div class="panel-title">
                            商品管理
                        </div>
                    </div>
                    <div id="examManager" class="collapse panel-collapse ">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item" ><a href="../admin/add/addgoods.php" target="mainFrame">新增商品信息</a></li>
                                <li class="list-group-item"><a href="../admin/delete/deletegoods.php" target="mainFrame">删除商品信息</a></li>
                                <li class="list-group-item"><a href="../admin/update/updategoods.php" target="mainFrame">更新商品信息</a></li>
                                <li class="list-group-item"><a href="../admin/select/selectgoods.php" target="mainFrame">查看商品信息</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- 第三个菜单 -->
                <div class="panel panel-default">
                    <div class="panel-heading" data-target="#classManager" data-toggle="collapse" data-parent="#menu-group">
                        <div class="panel-title" >
                            养生文章管理
                        </div>
                    </div>
                    <div id="classManager" class="collapse panel-collapse ">
                        <div class="panel-body">
                            <ul class="list-group">
                            <li class="list-group-item" ><a href="../admin/add/addmessage.php" target="mainFrame">新增文章信息</a></li>
                                <li class="list-group-item"><a href="../admin/delete/deletemessage.php" target="mainFrame">删除文章信息</a></li>
                                <li class="list-group-item"><a href="../admin/select/selectmessage.php" target="mainFrame">查看文章信息</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 right-box">
                <iframe src="" class="mainFrame" name="mainFrame" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</body>
<script src="../js/jquery.js"></script>
<script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</html>