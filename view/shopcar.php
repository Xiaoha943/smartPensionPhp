<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>购物车</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/js/responsiveslides.min.js">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/iconfont.css">
    <!-- <link rel="stylesheet" href="../css/message.css"> -->
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
            <a class='inback' href='./admin/admin.php'>进入后台</a>";
                } else if ($_SESSION['qx'] == 2) {
                    echo "<p class='p1'>欢迎vip" . $_SESSION['name'] . "登录</p>";
                } elseif ($_SESSION['qx'] == 1) {
                    echo "<p class='p1'>欢迎用户" . $_SESSION['name'] . "登录</p>";
                }
                echo "<a class='return'href='server/zhuxiao.php'>注销</a>";
            } else {
                echo "<a class='register' href='./register.php'>请登录</a>";
            }
            ?>
            <a class="return" href="../main.php">首页</a>
            <div class="iconfont_right">
                <span class="iconfont icon5"><a href="../view/order.php">订单管理</a></span>
            </div>

        </div>
    </div>
    <!-- 栏目 -->
    <div class="container">
        <div id="shopcar_title">
            <ul class="title_ul">
                <li class="li1"><input type='checkbox' id='ckAll'>全选</li>
                <li class="li1">商品</li>
                <li class="li1">单价</li>
                <li class="li1">数量</li>
                <li class="li1">操作</li>
            </ul>
        </div>
        <!-- 购物车商品栏 -->
        <div class="shopcar_content">
            <?php
            include("../conn/conn.php");
            // session_start();
            if (isset($_SESSION['name'])) {
                $sql = 'select uid from user where username="' . $_SESSION['name'] . '"';
                $retval = mysqli_query($conn, $sql);
                $rows = mysqli_fetch_array($retval, MYSQLI_ASSOC);
                $uid = $rows['uid'];
                $sql1 = 'select *,count(*) count from shopcar where uid=' . $uid . ' group by gid';
                $retval1 = mysqli_query($conn, $sql1);
                while ($rows = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {
                    $sql2 = 'select * from goods where gid=' . $rows['gid'];
                    $retval2 = mysqli_query($conn, $sql2);
                    $rows2 = mysqli_fetch_array($retval2, MYSQLI_ASSOC);
                    $sum2 = $rows2['price'] * $rows['count'];
                    echo "<div class='shopcar_style'>
                    <input type='checkbox' id='check'>
            <img class='shopcar_img' src='../img/" . $rows2['img'] . "'>
            <div class='shopcar_last'>
        <p class='shopcar_gname'>" . $rows2['gname'] . "</p>
        <p class='shopcar_des'>" . $rows2['des'] . "</p>
        <p class='shopcar_price'>￥" . $rows2['price'] . "</p>
        <p class='shopcar_gid'>" . $rows2['gid'] . "</p>
        <p class='shopcar_litteprice'>" . $sum2 . "</p>
        <div class='reduce'>
        <a href='../server/reduceshopcar.php?gid=" . $rows2['gid'] . " '><span class='glyphicon glyphicon-minus'></span></a>        
        <input type='text' value=" . $rows["count"] . " class='shopcarsum'></input>
        <a href='../server/shopcar_sever.php?gid=" . $rows2['gid'] . "'><span class='glyphicon glyphicon-plus'></span></a>
        </div>
        <a class='delete' href='../server/deleteshopcar_server.php?gid=" . $rows2['gid'] . "'>删除</a>
        </div>
        </div>
        <div class='foot_bar'>
        <ul class='foot_content'>
            <li></li>
            <li><span class='deleteAll'>删除选中商品</span></li>
            <li class='foot_price'>总价:<span class='foot_input'></span></li>
            <li class='foot_sum'><a href='../view/order.php'>去结算</a></li>
        </ul>
    </div>
        ";
                }
            } else {
                echo "<script>
        alert('请登录！');
        location.href='../view/register.php';
        </script>";
            }


            ?>
        </div>
    </div>


</body>
<script>
    var ckAll = document.querySelector("#ckAll");
    var ckList = document.querySelectorAll("#check");
    ckAll.onchange = function() {
        ckList.forEach(function(item) {
            item.checked = ckAll.checked;
        })
    }
    for (var i = 0; i < ckList.length; i++) {
        ckList[i].onchange = function() {
            var ckAllList = document.querySelectorAll("#check");
            var ckArr = Array.prototype.slice.call(ckAllList);
            var result = ckArr.every(function(item, index, _arr) {
                return item.checked;
            });
            ckAll.checked = result;

        }
    }

    var xj =0;
    $('input#check').click(function() {
        var flag = $(this).prop('checked');
        var c = this.parentNode.childNodes[5].childNodes[9].innerHTML;
        if (flag) {
            xj += parseInt(c);
            $('.foot_input').text(xj);
        } else {
            xj -= parseInt(c);
            $('.foot_input').text(xj);
        }
    })

    document.querySelector('.shopcar_content').addEventListener('click', function() {
        if (event.target.matches("input#check")) {
            var a = event.target.parentNode.childNodes[5].childNodes[7].innerHTML;
            console.log(a);
            $('.deleteAll').click(function() {
                console.log(123);
                $.post('../server/checkAll_server.php', {
                    gid: a
                }, function(data, status) {
                    location.href = "../view/shopcar.php";
                })
            })
        }
    })

  

    document.addEventListener("click", function (event) {
    if (event.target.matches("#ckAll")) {
        $(".deleteAll").click(function () {
            $.post("../server/deleteAllshop.php", {

            }, function (data, status) {
                alert("删除成功！");
                location.href = 'shopcar.php';
            })
        })
        if ($('input#ckAll').prop('checked')) {
            $.post("../server/check_server.php", {}, function (data, status) {
                $('.foot_input').text(data);
                var xj = parseInt($('.foot_input').text());
                $('input#check').click(function () {
                    var flag = $(this).prop('checked');
                    var c = this.parentNode.childNodes[5].childNodes[9].innerHTML;
                    console.log(xj);
                    if (flag) {
                        xj += parseInt(c);
                        $('.foot_input').text(xj);
                    } else {
                        xj -= parseInt(c);
                        $('.foot_input').text(xj);
                    }
                })

            })
        }else{
            $('.foot_input').text(0);
        }
    }
})








    // $('#ckAll').click(function() {
    //     $('.deleteAll').click(function() {
    //         console.log(456);
    //         $.post('../server/deleteAllshop.php', {}, function(data, status) {
    //             console.log(data);
    //             location.href = "shopcar.php";
    //         })
    //     })
    // })
    // $('#ckAll').click(function() {
    //     $.post('../server/check_server.php', {}, function(data, status) {
    //         console.log(data);
    //         $('.foot_input').text("￥" + data);
    //     })
    // })
</script>

</html>