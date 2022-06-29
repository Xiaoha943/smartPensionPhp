<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>注册</title>
  <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/js/responsiveslides.min.js">
  <script src="../../js/jquery-3.2.1.min.js"></script>
  <script src="../../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="../../css/register.css"> -->
</head>

<body>
  <!-- 用户名：<input type="text"><span></span>
    密码：<input type="password"><span></span>
    手机号：<input type="tel"><span></span>
    地址：<input type="text" required>
    <button>注册</button> -->
  <div class="container-fluid">
    <div class="page-header">
      <h2 class="text-center text-primary">用户信息管理</h2>
    </div>
    <div class="form">
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label for="firstname" class="col-lg-3 control-label">用户名</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="firstname" placeholder="请输入用户名"><span></span>
          </div>
        </div>
        <div class="form-group">
          <label for="lastname" class="col-lg-3 control-label">密码</label>
          <div class="col-lg-6">
            <input type="password" class="form-control" id="lastname" placeholder="请输入密码"><span></span>
          </div>
        </div>
        <div class="form-group">
          <label for="lastname" class="col-lg-3 control-label">手机号</label>
          <div class="col-lg-6">
            <input type="tel" class="form-control" id="lastname" placeholder="请输入手机号"><span></span>
          </div>
        </div>
        <div class="form-group">
          <label for="lastname" class="col-lg-3 control-label">地址</label>
          <div class="col-lg-6">
            <input type="text" required class="form-control" id="lastname" placeholder="请输入地址">
          </div>
        </div>
        <div class="form-group">
          <label for="lastname" class="col-lg-3 control-label">权限</label>
          <!-- <div class="col-lg-6">
            <input type="text" required class="form-control" id="lastname" placeholder="请输入地址">
          </div> -->
          <select name="" id="option" >
            <option value="" required class="form-control" id="lastname" >0</option>
            <option value="">1</option>
            <option value="">2</option>
          </select>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-5 col-lg-7">
            <button type="button" class="btn btn-default btn-primary">新增用户</button>
          </div>
        </div>

    </div>
</body>
<script>
  $('button:eq(0)').click(function() {
    $.post("../../server/ADD/adduser_server.php", {
      username: $('input:eq(0)').val(),
      pwd: $('input:eq(1)').val(),
      tel: $('input:eq(2)').val(),
      address: $('input:eq(3)').val(),
      qx:$('#option options:select').text()
    }, function(data, status) {
      console.log(data);
      if (data == 1) {
        $('span:eq(2)').text("手机号格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('input:eq(2)').val("");
      } else if (data == 2) {
        $('span:eq(1)').text("密码和手机号格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('input:eq(1)').val("");
      } else if (data == 3) {
        $('span:eq(0)').text("用户名格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('input:eq(0)').val("");
      } else if (data == 4) {
        $('span:eq(0)').text("用户名密码格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('input:eq(0)').val("");
      } else if (data == 5) {
        $('span:eq(0)').text("用户名手机号格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('input:eq(0)').val("");
      } else if (data == 6) {
        $('span:eq(0)').text("用户名手机号密码格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('input:eq(0)').val("");
      } else if (data == 7) {
        $('span:eq(1)').text("密码格式不对").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('input:eq(1)').val("");
      } else if (data == 8) {
        alert('注册成功');
        location.href = './adduser.php';
      } else if (data == 9) {
        $('span:eq(2)').text("该用户已存在").css({
          'color': 'red',
          'fontsize': '10px'
        });
        $('input:eq(2)').val("");
      }
    })
  })
</script>

</html>