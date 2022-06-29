<?php
include('../conn/conn.php');
session_start();
$gid=$_GET['gid'];
$id=$_GET['id'];
if(isset($_SESSION['name'])){
    $sql='select uid,address from user where username="'.$_SESSION['name'].'"';
    $retval=mysqli_query($conn,$sql);
    // if(!$retval){
    //     die("错误".mysqli_error($conn));
    // }else {
    //     echo "成功";
    // }
    $rows=mysqli_fetch_array($retval,MYSQLI_ASSOC);
    $uid=$rows['uid'];
    $address=$rows['address'];
    $sql1="insert into orders(uid,gid,address) values('".$uid."','".$gid."','".$address."')";
    $retval1=mysqli_query($conn,$sql1);
    // if(!$retval1){
    //         die("错误".mysqli_error($conn));
    //     }else {
    //         echo "成功";
    //     }
        echo "<script>location.href='../view/order.php?id=".$id."';
        </script>";
}else {
    echo '<script>
    alert("请登录！");
    location.href="../main.php";
    </script>';
}

?>