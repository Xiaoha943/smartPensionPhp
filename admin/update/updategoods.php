<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="../../js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../../css/admin.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="page-header">
            <h2 class="text-center text-primary">商品信息管理</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <tr>
                <th>商品id</th>
                    <th>商品名</th>
                    <th>价格</th>
                    <th>vip价格</th>
                    <th>图片</th>
                    <th>描述</th>
                    <th>商品类型</th>
                    <th>操作</th>
                </tr>
                <?php
                include('../../conn/conn.php');
                $sql = 'select * from goods';
                $retval = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                    echo " <tr>   
                <td>" . $rows['gid'] . "</td>         
            <td>" . $rows['gname'] . "</td>
            <td>" . $rows['price'] . "</td>
            <td>" . $rows['vprice'] . "</td>
            <td>" . $rows['img'] . "</td>
            <td>" . $rows['des'] . "</td>
           <td>" . $rows['tid'] . "</td>
            <td ><button class='btn-primary'>更新</button></td>
            </tr>";
                }
                ?>
            </table>
        </div>
        <div class="updata-box">
            <div class="form-horizontal" role="form">
                <div class="form-group" id="first">
                    <label for="firstname" class="col-lg-3 control-label">商品id</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="firstname" placeholder="请输入用户名"><span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-lg-3 control-label">商品名</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="firstname" placeholder="请输入用户名"><span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-lg-3 control-label">价格</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="lastname" placeholder="请输入密码"><span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-lg-3 control-label">vip价格</label>
                    <div class="col-lg-6">
                        <input type="tel" class="form-control" id="lastname" placeholder="请输入手机号"><span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-lg-3 control-label">图片</label>
                    <div class="col-lg-6">
                        <input type="text" required class="form-control" id="lastname" placeholder="请输入地址">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-lg-3 control-label">描述</label>
                    <div class="col-lg-6">
                        <input type="text" required class="form-control" id="lastname" placeholder="请输入地址">
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-lg-3 control-label">商品类型</label>
                    <div class="col-lg-6">
                        <input type="text" required class="form-control" id="lastname" placeholder="请输入地址">
                    </div>
                </div>
                <div class="btn-box"><button  class="btn-primary" id="take">提交</button></div>
            </div>
        </div>

    </div>
</body>
<script src="../../js/jquery.js"></script>
<script src="../../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script>
    //  $(document).ready(function() {
    //     $('.delete').click(function() {
    //         $.post("../../server/DELETE/deleteuser_server.php", {
    //             uid: $('.uid').text()    
    //         }, function(data, status) {
    //             console.log(data);
    //         })
    //     })
    // })

    document.querySelector("table").addEventListener("click", function(event) {
        if (event.target.innerHTML == "更新") {
            var gid = event.target.parentNode.parentNode.childNodes[1].innerHTML;
            var gname = event.target.parentNode.parentNode.childNodes[3].innerHTML;
            var price = event.target.parentNode.parentNode.childNodes[5].innerHTML;
            var vprice = event.target.parentNode.parentNode.childNodes[7].innerHTML;
            var img = event.target.parentNode.parentNode.childNodes[9].innerHTML;
            var des = event.target.parentNode.parentNode.childNodes[11].innerHTML;
            var tid = event.target.parentNode.parentNode.childNodes[13].innerHTML;
            console.log(gid);
            $('.updata-box').css({
                "display": "block"
            })
            $('input:eq(0)').val(gid);
            $('input:eq(1)').val(gname);
            $('input:eq(2)').val(price);
            $('input:eq(3)').val(vprice);
            $('input:eq(4)').val(img);
            $('input:eq(5)').val(des);
            $('input:eq(6)').val(tid)
        }
    })
    $('#take').click(function() {
        $.post("../../server/UPDATE/updategoods_server.php", {
            gid: $('input:eq(0)').val(),
            gname: $('input:eq(1)').val(),
            price: $('input:eq(2)').val(),
            vprice: $('input:eq(3)').val(),
            img:$('input:eq(4)').val(),
            des: $('input:eq(5)').val(),
            tid:$('input:eq(6)').val()
        }, function(data, status) {
            if(data==1){
                location.href="updategoods.php";
                alert("更新成功");
                $('.updata-box').css({
                "display": "none"
            })
            }else{
                alert("更新失败");
            }
           
        })
    })
    // const table=document.querySelector("table")
    // table.addEventListener("click",(e)=>{
    //     if(e.target.innerHTML=="删除"){
    //         let a=e.target.parentNode.parentNode.childNodes[1].innerHTML;
    //         console.log(a);

    //     }
    // })
</script>

</html>