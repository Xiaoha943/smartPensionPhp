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
            <h2 class="text-center text-primary">用户信息管理</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <tr>
                    <!-- <th>
                        <label for="">
                            <input type="checkbox">全选
                        </label>
                    </th> -->
                    <th>用户id</th>
                    <th>用户名</th>
                    <th>密码</th>
                    <th>手机号</th>
                    <th>地址</th>
                    <th>权限</th>
                    <th>操作</th>
                </tr>
                <?php
                include('../../conn/conn.php');
                $sql = 'select * from user';
                $retval = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                    echo " <tr>   
                <td class='uid'>" . $rows['uid'] . "</td>         
            <td>" . $rows['username'] . "</td>
            <td>" . $rows['pwd'] . "</td>
            <td>" . $rows['tel'] . "</td>
            <td>" . $rows['address'] . "</td>
            <td>" . $rows['qx'] . "</td>
            <td ><button class='btn-primary'>更新</button></td>
            </tr>";
                }
                ?>
            </table>
        </div>
        <div class="updata-box">
            <div class="form-horizontal" role="form">
                <div class="form-group" id="first">
                    <label for="firstname" class="col-lg-3 control-label">用户id</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="firstname" placeholder="请输入用户名"><span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="firstname" class="col-lg-3 control-label">用户名</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="firstname" placeholder="请输入用户名"><span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastname" class="col-lg-3 control-label">密码</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="lastname" placeholder="请输入密码"><span></span>
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
                    <div class="col-lg-6">
                        <input type="text" required class="form-control" id="lastname" placeholder="请输入地址">
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="lastname" class="col-lg-3 control-label">权限</label>
                    <select name="" id="option">
                        <option value="" required class="form-control" id="lastname">0</option>
                        <option value="">1</option>
                        <option value="">2</option>
                    </select>
                </div> -->
                <div class="btn-box"><button class="btn-primary" id="take">提交</button></div>
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
            var uid = event.target.parentNode.parentNode.childNodes[1].innerHTML;
            var uname = event.target.parentNode.parentNode.childNodes[3].innerHTML;
            var pwd = event.target.parentNode.parentNode.childNodes[5].innerHTML;
            var tel = event.target.parentNode.parentNode.childNodes[7].innerHTML;
            var address = event.target.parentNode.parentNode.childNodes[9].innerHTML;
            var qx = event.target.parentNode.parentNode.childNodes[11].innerHTML;
            console.log(qx);
            $('.updata-box').css({
                "display": "block"
            })
            $('input:eq(0)').val(uid);
            $('input:eq(1)').val(uname);
            $('input:eq(2)').val(pwd);
            $('input:eq(3)').val(tel);
            $('input:eq(4)').val(address);
            $('input:eq(5)').val(qx)
        }
    })
    $('#take').click(function() {
        $.post("../../server/UPDATE/updateuser_server.php", {
            uid: $('input:eq(0)').val(),
            uname: $('input:eq(1)').val(),
            pwd: $('input:eq(2)').val(),
            tel: $('input:eq(3)').val(),
            address:$('input:eq(4)').val(),
            qx: $('input:eq(5)').val()
        }, function(data, status) {
            if(data==1){
                location.href="./updateuser.php";
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