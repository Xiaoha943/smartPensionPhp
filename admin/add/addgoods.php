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
</head>

<body>
  
  <div class="container-fluid">
    <div class="page-header">
      <h2 class="text-center text-primary">商品信息管理</h2>
    </div>
    <div class="form">
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label for="lastname" class="col-lg-3 control-label">商品名</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="lastname" placeholder="请输入商品"><span></span>
          </div>
        </div>
        <div class="form-group">
          <label for="lastname" class="col-lg-3 control-label">价格</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="lastname" placeholder="请输入价格"><span></span>
          </div>
        </div>
        <div class="form-group">
          <label for="lastname" class="col-lg-3 control-label">vip价格</label>
          <div class="col-lg-6">
            <input type="text" required class="form-control" id="lastname" placeholder="请输入vip价格">
          </div>
        </div>
        <div class="form-group">
          <label for="firstname" class="col-lg-3 control-label">图片</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="firstname" placeholder="请输入图片名"><span></span>
          </div>
        </div>
        <div class="form-group">
          <label for="firstname" class="col-lg-3 control-label">描述</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="firstname" placeholder="请输入描述"><span></span>
          </div>
        </div>
        <div class="form-group">
          <label for="firstname" class="col-lg-3 control-label">商品类型</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="firstname" placeholder="请输入商品类型"><span></span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-offset-5 col-lg-7">
            <button type="button" class="btn btn-default btn-primary">新增商品</button>
          </div>
        </div>
    </div>
</body>
<script>
  $('button:eq(0)').click(function() {
    $.post("../../server/ADD/addgoods_server.php", {
      gname: $('input:eq(0)').val(),
      price: $('input:eq(1)').val(),
      vprice: $('input:eq(2)').val(),
      img: $('input:eq(3)').val(),
      des: $('input:eq(4)').val(),
      tid: $('input:eq(5)').val(),
    }, function(data, status) {
      console.log(data);
      if(data==1){
           alert('添加成功！');
          location.href="../../admin/add/addgoods.php"
        }else{
          alert('添加错误，请重新检查字段！')
      }
    })
  })
</script>

</html>