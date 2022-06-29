<?php
include('../conn/conn.php');
$gid=$_POST['gid'];
    $sql='delete from shopcar where gid="'.$gid.'"';
    $retval=mysqli_query($conn,$sql);
    // if(!$retval){
    //     die("错误".mysqli_error($conn));
    // }else {
    //     echo "成功";
    // }

?>