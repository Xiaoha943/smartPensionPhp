<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登录注册</title>
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap-3.3.7-dist/js/responsiveslides.min.js">
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/register.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css'>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form action="#" >
        <h1>注册</h1>
        <input class="name" type="text" placeholder="用户名" /><span></span>
        <input class="pwd" type="password" placeholder="密码" /><span></span>
        <input class="tel" type="tel" placeholder="手机号" /><span></span>
        <input class="address" type="text" placeholder="地址" /><span></span>
        <button type="button">注册</button>
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form action="#">
        <h1>登录</h1>
        <input class="index_name" type="text" placeholder="用户名" /><span class="res"></span>
        <input class="index_pwd" type="password" placeholder="密码" /><span class="pass"></span>
        <button type="button">登录</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>欢迎回来！</h1>
          <p>请您先登录的个人信息，进行操作。</p>
          <button class="ghost" id="signIn">登录</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>你好！</h1>
          <p>输入您的个人信息进行注册。</p>
          <button class="ghost" id="signUp">注册</button>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  $('button:eq(0)').click(function() {
    $.post("../server/register_server.php", {
      username: $('.name').val(),
      pwd: $('.pwd').val(),
      tel: $('.tel').val(),
      address: $('.address').val(),
    }, function(data, status) {
      console.log(data);
      if (data == 1) {
        $('span:eq(2)').text("手机号格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('.tel').val("");
      } else if (data == 2) {
        $('span:eq(1)').text("密码和手机号格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('.pwd,.tel').val("");
      } else if (data == 3) {
        $('span:eq(0)').text("用户名格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('.name').val("");
      } else if (data == 4) {
        $('span:eq(0)').text("用户名密码格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('.name,.pwd').val("");
      } else if (data == 5) {
        $('span:eq(0)').text("用户名手机号格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('.name,.tel').val("");
      } else if (data == 6) {
        $('span:eq(0)').text("用户名手机号密码格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('.name,.pwd,.tel').val("");
      } else if (data == 7) {
        $('span:eq(1)').text("密码格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('.pwd').val("");
      } else if (data == 8) {
        alert('注册成功');
        location.href = 'register.php';
      } else if (data == 9) {
        $('span:eq(2)').text("该用户已存在").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('.name').val("");
      }
    })
  })


  $('button:eq(1)').click(function() {
        $.post('../server/index_server.php', {
            name: $('.index_name').val(),
            pwd: $('.index_pwd').val()
        }, function(data, status) {
            console.log(data);
            if (data == 1) {
                $(".res").text("该用户不存在").css({
                    "color": "red",
                    'fontsize': '16px'
                })
                $('.text').val('');
            } else if (data == 2) {
                $(".pass").text("密码错误").css({
                    "color": "red",
                    'fontsize': '16px'
                })
                console.log(2);
                $('.index_pwd').val('');
            } else if (data == 3) {
                location.href = "../main.php";
            }
        })

    })
</script>
<script  src="../js/index.js"></script>

</html>