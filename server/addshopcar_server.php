<?php
include('../conn/conn.php');
session_start();
$gid=$_GET['gid'];
$id=$_GET['id'];
if(isset($_SESSION['name'])){
    $sql='select uid from user where username="'.$_SESSION['name'].'"';
    $retval=mysqli_query($conn,$sql);
    // if(!$retval){
    //     die("错误".mysqli_error($conn));
    // }else {
    //     echo "成功";
    // }
    $rows=mysqli_fetch_array($retval,MYSQLI_ASSOC);
    $uid=$rows['uid'];
    $sql1="insert into shopcar(uid,gid) values(".$uid.",".$gid.")";
    $retval1=mysqli_query($conn,$sql1);
    // if(!$retval1){
    //         die("错误".mysqli_error($conn));
    //     }else {
    //         echo "成功";
    //     }
    $sql2 = 'select tname,tid from type';
    $retval2 = mysqli_query($conn, $sql2);
    // if(!$retval2){
    //     die("错误".mysqli_error($conn));
    // }else {
    //     echo "成功";
    // }
    while ($rows = mysqli_fetch_array($retval2, MYSQLI_ASSOC)) {
        echo "<script>location.href='../main.php?id=".$id."';
        </script>";
        
    }
}else {
    echo '<script>
    alert("请登录！");
    location.href="../view/register.php";
    </script>';
}

?>