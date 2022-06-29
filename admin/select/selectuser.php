<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理</title>
    <link rel="stylesheet" href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <!--[if lt IE 9]>
        <script src="./css/bootstrap/html5shiv.min.js"></script>
        <script src="./css/bootstrap/respond.min.js"></script>
    <![endif]-->
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
                    <th>用户名</th>
                    <th>密码</th>
                    <th>手机号</th>
                    <th>地址</th>
                    <th>权限</th>
                </tr>
                <?php
                include('../../conn/conn.php');
                $sql = 'select * from user';
                $retval = mysqli_query($conn, $sql);
               
                while ($rows = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
                    echo " <tr>
                   <td>" . $rows['username'] . "</td>
                   <td>" . $rows['pwd'] . "</td>
                   <td>" . $rows['tel'] . "</td>
                   <td>" . $rows['address'] . "</td>
                   <td>" . $rows['qx'] . "</td>
                   </tr>";
                }
                ?>
            </table>
        </div>

    </div>
</body>
<script src="../../js/jquery.js"></script>
<script src="../../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</html>