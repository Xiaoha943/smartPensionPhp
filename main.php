<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的商城</title>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=PPuFex6dQHXEVTCO3B32GvPIG4MAIjtd"></script>
    <script src="./js/main.js"></script>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/message.css">
    <link rel="stylesheet" href="./css/iconfont.css">
</head>

<body>
    <!-- 登录栏 -->
    <div id="top"></div>
    <div class="hdtop">
        <div class="contain">
            <?php
            include('./conn/conn.php');
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
                echo "<a class='return'href='server/zhuxiao.php'>注销</a> <div id='address'>
                <p><span id='province'></span></p>
                <p><span id='city'></span></p>
                <p><span id='detail'></span></p>
            </div>";
            } else {
                echo "<a class='register' href='view/register.php'>请登录</a>";
            }
            ?>
            <div class="iconfont_right">
                <span class="iconfont icongouwuche1"><a href="./view/shopcar.php">购物车</a></span>
                <?php
                if (isset($_SESSION['name'])) {
                    $sql3 = 'select uid from user where username="' . $_SESSION['name'] . '"';
                    $retval3 = mysqli_query($conn, $sql3);
                    $rows = mysqli_fetch_array($retval3, MYSQLI_ASSOC);
                    $uid = $rows['uid'];
                    $sql4 = 'select * from shopcar where uid=' . $uid;
                    // $retval4 = mysqli_query($conn, $sql4);
                    $num4 = mysqli_num_rows(mysqli_query($conn, $sql4));
                    echo "<div class='shopcar_num'><span class='num'>" . $num4 . "</span></div>
                    <a href='./view/shopcar.php'>
                    <ul class='shopcar-box'>
                    <li><span class='iconfont icongouwucheman'></span></li>
                    <li>购</li>
                    <li>物</li>
                    <li>车</li>
                    <li>" . $num4 . "</li>
                    </ul>
                    </a>
                    ";
                }
                ?>
                <span class="iconfont icon5"><a href="./view/order.php">订单管理</a></span>
            </div>
            
        </div>
    </div>
    <!-- 搜索框 -->
    <div class="message_box">
        <div class="search">
            <input type="text" placeholder="输入关键词" />
            <a class="buttom" href="javascript:">搜索</a>
        </div>
        <div class="button_box">
            <button class="shopbuttom"><span></span><a href="message.php">养生资讯</a></button>
        </div>
    </div>
    <!-- <input type="text"><button>搜索</button> -->
    <!-- 类别导航栏 -->
    <ul class="ul1">
        <?php
        $sql = 'select tname,tid from type';
        $retval = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
            echo " <li>
            <a href='?id=" . $rows['tid'] . "'>" . $rows['tname'] . "</a>
            </li>";
        }
        ?>
    </ul>
    <!-- 顶部 -->
    
    <!-- 轮播图 -->
    <div class="main_image">
        <div class="img-box">
            <img src="./img/banner.jpg" alt="">
            <img src="./img/banner.jpg" alt="">
            <!-- <img src="./img/messagelook/01.jpg" alt="">
            <img src="./img/messagelook/02.jpg" alt="">
            <img src="./img/messagelook/03.jpg" alt=""> -->
        </div>
    </div>
    <!-- 商品content -->

    <!-- 商品界面 养生  id=1 -->
    <div class=" div5">
        <div class="goods_form book">
            <?php
            $sql1 = 'select * from goods where tid=5';
            $retval = mysqli_query($conn, $sql1);
            $pagesize = 8; //设置每一页的数据量
            $pagesum = mysqli_num_rows($retval);
            $pagenum = ceil($pagesum / $pagesize);
            (isset($_GET['page'])) ? ($page = $_GET['page']) : ($page = 1);
            ($page <= $pagenum) ? $page : ($page = $pagenum);
            $numberone = ($page - 1) * $pagesize;
            $sql2 = 'select * from goods where tid=5 order by gid limit ' . $numberone . ',' . $pagesize;
            $retval1 = mysqli_query($conn, $sql2);
            
            while ($rows = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {
                echo " <div class='goods'> 
        <img class='goods_img' src='./img/" . $rows['img'] . "'> 
        <h3 class='titl'>" . $rows['gname'] . "</h3>
        <p class='goods_des'>" . $rows['des'] . "</p>
        <span class='price'>价格：" . $rows['price'] . "</span>
        <span class='vipprice'>会员价：" . $rows['vprice'] . "</span>
        <div class='shop_car'><div class='car'><a href='server/addshopcar_server.php?id=".$rows['tid']."&gid=" . $rows['gid'] . "'>加购物车</a></div>
        <div class='shop_button car'><a href='./server/addorder_server.php?id=".$rows['tid']."&gid=" . $rows['gid'] . "''>直接购买</a></div></div>
        </div>";
            }
            echo"<div class='pagebox'>
            <div class='page'>";
            echo "共有" . $pagesum . "商品";
            echo "当前是" . $page . "页,共" . $pagenum . "页";
            if ($page > 1) {
                echo "<a class='page_text' href='?id=5&page=1'>首页</a>";
                echo "<a class='page_text' href='?id=5&page=" . ($page - 1) . "'>上一页</a>";
            } else {
                echo "首页";
                echo "上一页";
            }
            if ($page <$pagenum) {
                echo "<a class='page_text' href='?id=5&page=" . ($pagenum) . "'>尾页</a>";
                echo "<a class='page_text' href='?id=5&page=" . ($page + 1) . "'>下一页</a>";
            } else {
                echo "尾页";
                echo "下一页 ";
            }
            echo"</div></div>";
            ?>
        </div>
    </div>
    <div class="none div1">
        <div class="goods_form food">
            <?php
            $sql1 = 'select * from goods where tid=1';
            $retval = mysqli_query($conn, $sql1);
            $pagesize = 8; //设置每一页的数据量
            $pagesum = mysqli_num_rows($retval);
            $pagenum = ceil($pagesum / $pagesize);
            (isset($_GET['page'])) ? ($page = $_GET['page']) : ($page = 1);
            ($page <= $pagenum) ? $page : ($page = $pagenum);
            $numberone = ($page - 1) * $pagesize;
            $sql2 = 'select * from goods order by gid limit ' . $numberone . ',' . $pagesize;
            $retval1 = mysqli_query($conn, $sql2);

            while ($rows = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {
                echo " <div class='goods'> 
        <img class='goods_img' src='./img/" . $rows['img'] . "'> 
        <h3 class='titl'>" . $rows['gname'] . "</h3>
        <p class='goods_des'>" . $rows['des'] . "</p>
        <span class='price'>价格：" . $rows['price'] . "</span>
        <span class='vipprice'>会员价：" . $rows['vprice'] . "</span>
        <div class='shop_car'><div class='car'><a href='server/addshopcar_server.php?id=".$rows['tid']."&gid=" . $rows['gid'] . "''>加购物车</a></div>
        <div class='shop_button car'><a href='./server/addorder_server.php?id=".$rows['tid']."&gid=" . $rows['gid'] . "''>直接购买</a></div></div>
        </div>";
            }
            echo"<div class='pagebox'>
            <div class='page'>";
            echo "共有" . $pagesum . "商品";
            echo "当前是" . $page . "页,共" . $pagenum . "页";
            if ($page > 1) {
                echo "<a class='page_text' href='?id=1&page=1'>首页</a>";
                echo "<a class='page_text' href='?id=1&page=" . ($page - 1) . "'>上一页</a>";
            } else {
                echo "首页";
                echo "上一页";
            }
            if ($page < $pagenum) {
                echo "<a class='page_text' href='?id=1&page=" . ($pagenum) . "'>尾页</a>";
                echo "<a class='page_text' href='?id=1&page=" . ($page + 1) . "'>下一页</a>";
            } else {
                echo "尾页";
                echo "下一页";
            }
            echo"</div></div>"
            ?>
        </div>
    </div>
    <div class="none div3">
        <div class="goods_form food">
            <?php
            $sql1 = 'select * from goods where tid=3';
            $retval = mysqli_query($conn, $sql1);
            $pagesize = 8; //设置每一页的数据量
            $pagesum = mysqli_num_rows($retval);
            $pagenum = ceil($pagesum / $pagesize);
            (isset($_GET['page'])) ? ($page = $_GET['page']) : ($page = 1);
            ($page <= $pagenum) ? $page : ($page = $pagenum);
            $numberone = ($page - 1) * $pagesize;
            $sql2 = 'select * from goods where tid=3  order by gid limit ' . $numberone . ',' . $pagesize;
            $retval1 = mysqli_query($conn, $sql2);
            while ($rows = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {
                echo " <div class='goods'> 
        <img class='goods_img' src='./img/" . $rows['img'] . "'> 
        <h3 class='titl'>" . $rows['gname'] . "</h3>
        <p class='goods_des'>" . $rows['des'] . "</p>
        <span class='price'>价格：" . $rows['price'] . "</span>
        <span class='vipprice'>会员价：" . $rows['vprice'] . "</span>
        <div class='shop_car'><div class='car'><a href='server/addshopcar_server.php?id=".$rows['tid']."&gid=" . $rows['gid'] . "''>加购物车</a></div>
        <div class='shop_button car'><a href='./server/addorder_server.php?id=".$rows['tid']."&gid=" . $rows['gid'] . "''>直接购买</a></div></div>
        </div>";
            }
            echo"<div class='pagebox'>
            <div class='page'>";
            echo "共有" . $pagesum . "商品";
            echo "当前是" . $page . "页,共" . $pagenum . "页";
            if ($page > 1) {
                echo "<a class='page_text' href='?id=3&page=1'>首页</a>";
                echo "<a class='page_text' href='?id=3&page=" . ($page - 1) . "'>上一页</a>";
            } else {
                echo "首页";
                echo "上一页";
            }
            if ($page < $pagenum) {
                echo "<a class='page_text' href='?id=3&page=" . ($pagenum) . "'>尾页</a>";
                echo "<a class='page_text' href='?id=3&page=" . ($page + 1) . "'>下一页</a>";
            } else {
                echo "尾页";
                echo "下一页";
            }
            echo"</div></div>";
            ?>
        </div>
    </div>
    <div class="none div4">
        <div class="goods_form food">
            <?php
            $sql1 = 'select * from goods where tid=4';
            $retval = mysqli_query($conn, $sql1);
            $pagesize = 8; //设置每一页的数据量
            $pagesum = mysqli_num_rows($retval);
            $pagenum = ceil($pagesum / $pagesize);
            (isset($_GET['page'])) ? ($page = $_GET['page']) : ($page = 1);
            ($page <= $pagenum) ? $page : ($page = $pagenum);
            $numberone = ($page - 1) * $pagesize;
            $sql2 = 'select * from goods where tid=4  order by gid limit ' . $numberone . ',' . $pagesize;
            $retval1 = mysqli_query($conn, $sql2);
            while ($rows = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {
                echo " <div class='goods'> 
        <img class='goods_img' src='./img/" . $rows['img'] . "'> 
        <h3 class='titl'>" . $rows['gname'] . "</h3>
        <p class='goods_des'>" . $rows['des'] . "</p>
        <span class='price'>价格：" . $rows['price'] . "</span>
        <span class='vipprice'>会员价：" . $rows['vprice'] . "</span>
        <div class='shop_car'><div class='car'><a href='server/addshopcar_server.php?id=".$rows['tid']."&gid=" . $rows['gid'] . "''>加购物车</a></div>
        <div class='shop_button car'><a href='./server/addorder_server.php?id=".$rows['tid']."&gid=" . $rows['gid'] . "''>直接购买</a></div></div>
        </div>";
            }
            echo"<div class='pagebox'>
            <div class='page'>";
            echo "共有" . $pagesum . "商品";
            echo "当前是" . $page . "页,共" . $pagenum . "页";
            if ($page > 1) {
                echo "<a class='page_text' href='?id=4&page=1'>首页</a>";
                echo "<a class='page_text' href='?id=4&page=" . ($page - 1) . "'>上一页</a>";
            } else {
                echo "首页";
                echo "上一页";
            }
            if ($page < $pagenum) {
                echo "<a class='page_text' href='?id=4&page=" . ($pagenum) . "'>尾页</a>";
                echo "<a class='page_text' href='?id=4&page=" . ($page + 1) . "'>下一页</a>";
            } else {
                echo "尾页";
                echo "下一页";
            }
            echo"</div></div>"
            ?>
        </div>
    </div>
    <div class="none div2">
        <div class="goods_form food">
            <?php
            $sql1 = 'select * from goods where tid=2';
            $retval = mysqli_query($conn, $sql1);
            $pagesize = 8; //设置每一页的数据量
            $pagesum = mysqli_num_rows($retval);
            $pagenum = ceil($pagesum / $pagesize);
            (isset($_GET['page'])) ? ($page = $_GET['page']) : ($page = 1);
            ($page <= $pagenum) ? $page : ($page = $pagenum);
            $numberone = ($page - 1) * $pagesize;
            $sql2 = 'select * from goods where tid=2  order by gid limit ' . $numberone . ',' . $pagesize;
            $retval1 = mysqli_query($conn, $sql2);
            while ($rows = mysqli_fetch_array($retval1, MYSQLI_ASSOC)) {
                echo " <div class='goods'> 
        <img class='goods_img' src='./img/" . $rows['img'] . "'> 
        <h3 class='titl'>" . $rows['gname'] . "</h3>
        <p class='goods_des'>" . $rows['des'] . "</p>
        <span class='price'>价格：" . $rows['price'] . "</span>
        <span class='vipprice'>会员价：" . $rows['vprice'] . "</span>
        <div class='shop_car'><div class='car'><a href='server/addshopcar_server.php?id=".$rows['tid']."&gid=" . $rows['gid'] . "''>加购物车</a></div>
        <div class='shop_button car'><a href='./server/addorder_server.php?id=".$rows['tid']."&gid=" . $rows['gid'] . "''>直接购买</a></div></div>
        </div>";
            }
            echo"<div class='pagebox'>
            <div class='page'>";
            echo "共有" . $pagesum . "商品";
            echo "当前是" . $page . "页,共" . $pagenum . "页";
            if ($page > 1) {
                echo "<a class='page_text' href='?id=2&page=1'>首页</a>";
                echo "<a class='page_text' href='?id=2&page=" . ($page - 1) . "'>上一页</a>";
            } else {
                echo "首页";
                echo "上一页";
            }
            if ($page < $pagenum) {
                echo "<a class='page_text' href='?id=2&page=" . ($pagenum) . "'>尾页</a>";
                echo "<a class='page_text' href='?id=2&page=" . ($page + 1) . "'>下一页</a>";
            } else {
                echo "尾页";
                echo "下一页";
            }
            echo"</div></div>"
            ?>
        </div>
    </div>
    <div><a href="#top" id="top"><span class="iconfont iconhuidaodingbu"></span></a></div>
    <div class="footer">
   

        <div class="wrap">

        </div>
    </div>
</body>
    <script>
        var id = location.search.substring(4, 5);
        console.log(id);
        if (id == 1) {
            $('.div1').css({
                "display": "block"
            })
            $('.div5').css({
                "display": "none"
            })
        } else if (id == 5) {
            $('.div5').css({
                "display": "block"
            })
        } else if (id == 3) {
            $('.div3').css({
                "display": "block"
            })
            $('.div5').css({
                "display": "none"
            })
        } else if (id == 4) {
            $('.div4').css({
                "display": "block"
            })
            $('.div5').css({
                "display": "none"
            })
        } else if (id == 2) {
            $('.div2').css({
                "display": "block"
            })
            $('.div5').css({
                "display": "none"
            })
        }
        
         // 百度地图API功能
    var geolocation = new BMap.Geolocation();
    geolocation.getCurrentPosition(function (r) {
        if (this.getStatus() == BMAP_STATUS_SUCCESS) {
            console.log(r.point.lng + "__" + r.point.lat);
            getAddress(r.point.lng, r.point.lat);
        }
        else {
            alert('failed' + this.getStatus());
        }
    }, { enableHighAccuracy: true })
    //关于状态码
    //BMAP_STATUS_SUCCESS	检索成功。对应数值“0”。
    //BMAP_STATUS_CITY_LIST	城市列表。对应数值“1”。
    //BMAP_STATUS_UNKNOWN_LOCATION	位置结果未知。对应数值“2”。
    //BMAP_STATUS_UNKNOWN_ROUTE	导航结果未知。对应数值“3”。
    //BMAP_STATUS_INVALID_KEY	非法密钥。对应数值“4”。
    //BMAP_STATUS_INVALID_REQUEST	非法请求。对应数值“5”。
    //BMAP_STATUS_PERMISSION_DENIED	没有权限。对应数值“6”。(自 1.1 新增)
    //BMAP_STATUS_SERVICE_UNAVAILABLE	服务不可用。对应数值“7”。(自 1.1 新增)
    //BMAP_STATUS_TIMEOUT	超时。对应数值“8”。(自 1.1 新增)
    //通过经纬度获取地址信息
    function getAddress(lng, lat) {
        var myGeo = new BMap.Geocoder();
        // 根据坐标得到地址描述    
        myGeo.getLocation(new BMap.Point(lng, lat), function (result) {
            if (result) {
                var province = result.addressComponents.province;
                var city = result.addressComponents.city;
                var detail = result.address;
                console.log(province)
                console.log(city)
                document.getElementById("province").innerText = province;
                document.getElementById("city").innerText = city;
                document.getElementById("detail").innerText = detail;
            }
        });
    }
    </script>

</html>