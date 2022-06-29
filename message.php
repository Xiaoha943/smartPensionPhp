<!doctype html>

<html>

<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />

    <title>养生文章</title>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <link href="./css/message.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/iconfont.css">
    <link rel="stylesheet" href="./css/main.css">

</head>

<body>
    <div id="top"></div>
    <div class="topmenu" id="tophead">v c

        <div class="wrap">

            <!-- <div id="mobilemenu"></div> -->

            <div class="menu">

                <div class="hdtop">
                    <div class="contain  message_div">
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
                            echo "<a class='return'href='server/zhuxiao.php'>注销</a>";
                        } else {
                            echo "<a class='register' href='view/register.php'>请登录</a>";
                        }
                        ?>

                    </div>

                </div>
            </div>


        </div>
        <div class="message_box">
            <div class="message_search">
                <input type="text" placeholder="输入关键词" />
                <a class="messagebuttom" href="javascript:">搜索</a>
            </div>
            <div class="button_box">
                <button class="shopbuttom"><span></span><a href="main.php">我的商城</a></button>
            </div>
        </div>
        <ul class="messageul">
            <li><a href="./message.php">健康养生</a></li>
            <li><a href="./main.php">健康购物</a></li>
            <li><a href="tel:15927104259">一键拨打号码</a></li>
        </ul>
    </div>



    <div class="subbody">

        <div class="wrap">

            <div class="row">

                <div class="left">
                    <div class="article_box">
                        <?php
                        include('./conn/conn.php');
                        $sql4 = 'select * from message';
                        $retval4 = mysqli_query($conn, $sql4);
                        while ($rows1 = mysqli_fetch_array($retval4, MYSQLI_ASSOC)) {
                            echo "
                                <div class='items'>
    
                                <div class='content-box'>
    
                                    <div class='posts-gallery-img'> <a href='javascript:0'><img class='thumbnail' src='./img/message/" . $rows1['mimg'] . "' alt='" . $rows1['mname'] . "' /></a> </div>
    
                                    <div class='posts-gallery-content'>
    
                                        <h2 class='title-top' target='_blank'>" . $rows1['mname'] . "</h2>
    
                                        <div class='posts-gallery-text'>" . $rows1['des'] . "</div>
    
                                        <div class='posts-default-info posts-gallery-info'>
    
                                            <ul>
    
                                                <li class='ico-cat'><i class='iconfont icon-liebiao'></i> <a href='javascript:0'>养生文章</a></li>
    
                                                <li class='ico-time'><i class='iconfont icon-iconfontshijian'></i> " . $rows1['time'] . "</li>
    
                                                <li class='ico-eye'><i class='iconfont iconchakan'></i> 1</li>
    
                                            </ul>
    
                                        </div>
    
                                    </div>
    
                                </div>
    
                            </div> ";
                        }
                        ?>



                    </div>

                </div>

                <!-- 右侧 -->

                <div class="right">

                    <div class="widget">

                        <h3><span>随便看看</span></h3>

                        <ul class="recent-posts-widget">
                            <?php
                            $sql6 = 'select * from messagelook ';
                            $retval6 = mysqli_query($conn, $sql6);
                            while ($rows3 = mysqli_fetch_array($retval6, MYSQLI_ASSOC)) {
                                echo "
                                      <li>

                                      <div class='recent-posts-img'><a href='javascript:0'><img src='img/messagelook/" . $rows3['mimg'] . "' class='thumbnail' alt=" . $rows3['mname'] . "></a></div>
      
                                      <div class='recent-posts-title'>
      
                                          <h4 class='tit'><a href='javascript:0'>" . $rows3['mname'] . "</a></h4>
      
                                          <span class='info'><i class='iconfont iconchakan'></i> 8</span>
                                      </div>
      
                                  </li>
                                      ";
                            }

                            ?>

                        </ul>

                    </div>

                    <div class="widget">

                        <h3><span>热门阅读</span></h3>

                        <ul class="hot-article">
                            <?php
                            $sql4 = 'select * from messagehot ';
                            $retval4 = mysqli_query($conn, $sql4);
                            while ($rows1 = mysqli_fetch_array($retval4, MYSQLI_ASSOC)) {
                                echo " <li> <a href='javascript:0' target='_blank'class='img'><i class='iconfont icon-fenxiang iconfanhui'></i><img src='img/messagehot/" . $rows1['himg'] . "' class='thumbnail' alt=" . $rows1['hname'] . "></a> </li>";
                            }

                            ?>
                        </ul>

                    </div>

                    <div class="widget">

                        <h3><span>阅读排行</span></h3>

                        <ul class="recent-posts-widget">
                            <?php
                            $sql4 = 'select * from messagelist';
                            $retval4 = mysqli_query($conn, $sql4);
                            while ($rows1 = mysqli_fetch_array($retval4, MYSQLI_ASSOC)) {
                                echo " <li><span class='listid'>" . $rows1['lid'] . "</span><a href='#'>" . $rows1['lname'] . "</a></li>";
                            }

                            ?>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <div><a href="#top" id="top"><span class="iconfont iconhuidaodingbu"></span></a></div>
    <div class="left1">
        <div class="article_box" id="article_box2">
            <a href="message.php"><span class="iconfont iconfanhui-copy">返回</span></a>
            <h2>老年痴呆测试</h2>
            <ul class="article-title">
                <li>发布时间：2020-06-11 10:22:51</li>
                <li>来源：网络整理</li>
                <li>浏览：1360</li>
            </ul>
            <p>老年痴呆是一种精神退化性疾病，多发于中老年人，发病原因除了基因遗传和环境要素外别的发病原因现阶段并不确定，即便在科技进步比较发达的今日，针对这类病症也无法痊愈，只有保证根据一些方法来缓解和减缓病况的发展趋势，针对中老年人而言，健康是最重要的，因此防止老年痴呆刻不容缓，日常生活要培养优良的饮食搭配和作息时间，确保有着一个身心健康的好身体。</p>
            <img src="/img/messageText/01.jpg" alt="">
            <p>下边大家来玩一些这几个简易的趣味测试，看一看你的大脑是不是还灵便!</p>
            <p> 1、你能找到图片中的鸟儿吗？</p>
            <img src="./img/messageText/02.jpg" alt="">
            <p>茂盛的枯叶中，你能寻找到鸟儿吗？</p>
            <img src="./img/messageText/03.jpg" alt="">
            <p>鸟儿在这儿，绿蓝双色的翎毛，看起来还非常漂亮。</p>
            <p>2、车内有几个人？</p>
            <img src="/img/messageText/04.jpg" alt="">
            <p>数人就可以，可到最后也只数出20个人，有的人说正确答案是21个，你可以找到吗？</p>
            <p>3、两个小三角颜色一样吗？</p>
            <img src="/img/messageText/05.jpg" alt="">
            <p>左右两边的小三角颜色是一样的吗？</p>
            <img src="/img/messageText/06.jpg" alt="">
            <p>一眼看上去右边颜色很深，但把两个小三角的背景色都换为灰黑色以后，就能发现它们的颜色其实是一样的</p>
            <p>这三道题你都答对了吗？对了的恭喜你,大脑很健康！</p>
            <p>预防老年痴呆搞好这几个方面</p>
            <p>1.补充萃枫苷</p>
            <img src="/img/messageText/07.jpg" alt="">
            <p>中老年人群要想头部健康，一定要补充萃枫苷。中老年人长期服用萃枫苷后，会提升中枢神经的活跃性，推动神经元细胞的再度发育，还会避免由于交感神经萎缩抑止人的大脑交感神经和神经元细胞导致的歧变和衰落，避免大脑萎缩，坍塌，萃枫苷在推动脑部生长发育的同时，还减缓了大脑神经衰退，它会改善中老年人的大脑血液循环系统，确保大脑神经氧浓度充足提供，推动基础代谢，使身患脑部疾病的中老年人群获得改善，像老年痴呆、记忆减退等中老年群体也是需要及时补充，因此萃枫苷也被亲切称作“大脑的保护天使”。
            </p>
            <p>2.坚持运动</p>
            <img src="/img/messageText/08.jpg" alt="">
            <p>人生的意义取决于运动，对老年人来讲一样，经常健身运动的老人身体相比不健身运动的人而言，手腿更为的灵活，逻辑思维也更为的活跃，健身运动不但能够推动身体的协调能力，也可以推动逻辑思维的协调能力，经常健身运动还能够防衰老，对老人而言，不妨一试呢？经常健身运动才可以有一个健康的好身体</p>
        </div>
    </div>

    <div class="footer">

        <div class="wrap">

        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('.messagebuttom').click(function() {
            $.post("/server/messageSearch_server.php", {
                value: $('input:eq(0)').val()
            }, function(data, status) {
                console.log(data);
                $(".article_box").hide();
                var father = $('.left');
                father.append(data);
            })
        })
    })
    $('.posts-gallery-content>h2').click(function() {
        $('.items').css({
            "display": "none"
        })
        $('.left1').css({
            "display": "block"
        })

    })
</script>

</html>