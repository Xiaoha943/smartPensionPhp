<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>订单管理</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/js/responsiveslides.min.js">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/iconfont.css">
</head>

<body>
    <!-- 登录栏 -->
    <div class="hdtop">
        <div class="contain">
            <?php
            include('../conn/conn.php');
            session_start();
            if (isset($_SESSION['name'])) {
                if ($_SESSION['qx'] == 0) {
                    echo "<p class='p1'>欢迎管理员" . $_SESSION['name'] . "登录</p>
            <a class='inback' href='../admin/admin.php'>进入后台</a>";
                } else if ($_SESSION['qx'] == 2) {
                    echo "<p class='p1'>欢迎vip" . $_SESSION['name'] . "登录</p>";
                } elseif ($_SESSION['qx'] == 1) {
                    echo "<p class='p1'>欢迎用户" . $_SESSION['name'] . "登录</p>";
                }
                echo "<a class='return'href='server/zhuxiao.php'>注销</a>";
            } else {
                echo "<a class='register' href='view/index.php'>请登录</a>";
            }
            ?>
            <a class="return" href="../main.php">首页</a>
            <div class="iconfont_right">
                <span class="iconfont icongouwuche1"><a href="../view/shopcar.php">购物车</a></span>
                <?php
                if (isset($_SESSION['name'])) {
                    $sql3 = 'select uid from user where username="' . $_SESSION['name'] . '"';
                    $retval3 = mysqli_query($conn, $sql3);
                    $rows = mysqli_fetch_array($retval3, MYSQLI_ASSOC);
                    $uid = $rows['uid'];
                    $sql4 = 'select * from shopcar where uid=' . $uid;
                    // $retval4 = mysqli_query($conn, $sql4);
                    $num4 = mysqli_num_rows(mysqli_query($conn, $sql4));
                    echo "<span class='shopcar_num'><span class='num'>" . $num4 . "</span></span>";
                }
                ?>
            </div>

        </div>
    </div>
    <!-- 栏目 -->
    <div class="container">
        <div id="shopcar_title">
            <ul class="title_order">
                <li class="li1">订单详情</li>
                <li class="li1">收货人地址</li>
                <li class="li1">金额</li>
                <li class="li1">操作</li>
            </ul>
        </div>
        <!-- 购物车商品栏 -->
        <div class="shopcar_content">
            <?php
            include("../conn/conn.php");
            // session_start();
            if (isset($_SESSION['name'])) {
                $sql = 'select uid,address from user where username="' . $_SESSION['name'] . '"';
                $retval = mysqli_query($conn, $sql);
                $rows = mysqli_fetch_array($retval, MYSQLI_ASSOC);
                $uid = $rows['uid'];
                $address = $rows['address'];
                $sql1 = 'select *,count(*) count from orders where uid=' . $uid . ' group by gid';
                $retval1 = mysqli_query($conn, $sql1);
                while ($rows = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {
                    $sql2 = 'select * from goods where gid=' . $rows['gid'];
                    $retval2 = mysqli_query($conn, $sql2);
                    $rows2 = mysqli_fetch_array($retval2, MYSQLI_ASSOC);
                    $sum2 = $rows2['price'] * $rows['count'];
                    $sql3 = 'select sum(price)from goods g join orders o on g.gid=o.gid join user u on o.uid=u.uid where u.uid="' . $uid . '"';
                    $retval3 = mysqli_query($conn, $sql3);
                    $sum = mysqli_fetch_array($retval3);
                    // if(!$retval3){
                    //     die("错误".mysqli_error($conn));
                    // }else {
                    //     echo "成功";
                    // }
                    echo "<div class='shopcar_style'>
            <img class='shopcar_img' src='../img/" . $rows2['img'] . "'>
            <div class='shopcar_last'>
        <p class='shopcar_gname'>" . $rows2['gname'] . "</p>
        <p class='shopcar_des order_des'>" . $rows2['des'] . "</p>
        <p class='order_address'>" . $address . "</p>
        <p class='shopcar_price'>￥" . $rows2['price'] . "</p>
        <p class='shopcar_gid'>" . $rows2['gid'] . "</p>
        <div class='reduce'>
        <a href='#'><span class='glyphicon glyphicon-minus'></span></a>        
        <input type='text' value=" . $rows["count"] . " class='shopcarsum'></input>
        <a href='#'><span class='glyphicon glyphicon-plus'></span></a>
        </div>
        <a class='delete' href='../server/deleteorder_server.php?gid=" . $rows2['gid'] . "'>取消订单</a>
        </div>
        </div>
        <div class='foot_bar'>
        <ul class='foot_content'>
            <li></li>
            <li></li>
            <li class='foot_price foot_order'>总价:<span class='foot_input'>" . $sum['sum(price)'] . "</span></li>
            <li class='foot_sum'><a href='#'>提交订单</a></li>
        </ul>
    </div>
        ";
                }
            } else {
                echo "<script>
        alert('请登录！');
        location.href='../main.php';
        </script>";
            }


            ?>
        </div>
        <div class="code">
            <img src="/img/2dcode.jpg" alt="">
        </div>
    </div>

</body>
<script>
    $('.foot_sum>a').click(function() {
        console.log('111');
        $('.code').css({
            "display": "block"
        })
        $('.code').click(function() {
            $('.code').css({
                "display": "none"
            })
        })
    })
</script>

</html>