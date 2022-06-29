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
            <h2 class="text-center text-primary">文章信息管理</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <tr>
                    <th>文章id</th>
                    <th>文章名</th>
                    <th>图片</th>
                    <th class="col-md-5">描述</th>
                    <th>用户id</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
                <?php
                include('../../conn/conn.php');
                $sql = 'select * from message';
                $retval = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                    echo " <tr>   
                <td>" . $rows['mid'] . "</td>         
            <td>" . $rows['mname'] . "</td>
            <td>" . $rows['mimg'] . "</td>
            <td>" . $rows['des'] . "</td>
            <td>" . $rows['uid'] . "</td>
            <td>" . $rows['time'] . "</td>
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
            $.post("../../server/DELETE/deletemessage_server.php", {
                mid: a
            }, function(data, status) {
                if(data==1){
                    alert('删除成功');
                    location.href = '../delete/deletemessage.php';
                }else{
                    alert('删除失败，有外键约束');
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