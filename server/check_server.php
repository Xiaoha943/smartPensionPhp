<?php
header('Content-type:text/html;charset=utf-8');
include('../conn/conn.php');
session_start();
if (isset($_SESSION['name'])) {
    $sql = 'select uid from user where username="' . $_SESSION['name'] . '"';
    $retval = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($retval, MYSQLI_ASSOC);
    $uid = $rows['uid'];
    $sql1='select sum(price)from goods g join shopcar s on g.gid=s.gid join user u on s.uid=u.uid where u.uid="'.$rows['uid'].'"';
    $retval1=mysqli_query($conn,$sql1);
    $sum=mysqli_fetch_array($retval1);
    echo"".$sum['sum(price)']."";
}else{
    echo "<script type='text/javascript'>
    alert('请先登录！');
    location.href='../view/register.php.php';
    </script>";
}

?>