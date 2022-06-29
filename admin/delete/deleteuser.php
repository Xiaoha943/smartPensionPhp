<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="../../js/jquery-3.2.1.min.js"></script>
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
            <td ><button class='btn-primary'>删除</button></td>
            </tr>";
                }
                ?>
            </table>
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
        if (event.target.innerHTML == "删除") {
            var a = event.target.parentNode.parentNode.childNodes[1].innerHTML;
            $.post("../../server/DELETE/deleteuser_server.php", {
                uid: a
            }, function(data, status) {
                if(data==0){
                    alert('删除失败，有外键约束');
                }else{
                    alert('删除成功');
                    location.href = '../delete/deleteuser.php';
                }
            })
        }
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