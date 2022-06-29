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
                    <th class="col-md-7">描述</th>
                    <th>用户id</th>
                    <th>时间</th>
                  
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
        
            </tr>";
                }
                ?>
            </table>
        </div>

    </div>
</body>


</html>