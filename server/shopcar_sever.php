<?php
include('../conn/conn.php');
session_start();
$gid=$_GET['gid'];
if(isset($_SESSION['name'])){
    $sql='select uid from user where username="'.$_SESSION['name'].'"';
    $retval=mysqli_query($conn,$sql);
    $rows1=mysqli_fetch_array($retval,MYSQLI_ASSOC);
    // if(!$retval){
    //     die("错误".mysqli_error($conn));
    // }else {
    //     echo "成功";
    // }
    $uid=$rows1['uid'];
    $sql1="insert into shopcar(uid,gid) values(".$uid.",".$gid.")";
    $retval1=mysqli_query($conn,$sql1);
    // if(!$retval1){
    //     die("错误".mysqli_error($conn));
    // }else {
    //     echo "成功";
    // }
    // if(!$retval1){
    //     die("错误".mysqli_error($conn));
    // }else {
    //     echo "成功";
    // }
    echo "<script type='text/javascript'>
    location.href='../view/shopcar.php';
    </script>";
}else{
    echo "<script type='text/javascript'>
    alert('请先登录！');
    location.href='../view/register.php';
    </script>";
}
?>
