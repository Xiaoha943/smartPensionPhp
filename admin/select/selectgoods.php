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
   
</script>

</html>