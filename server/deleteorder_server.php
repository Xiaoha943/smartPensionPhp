<?php
include("../conn/conn.php");
session_start();
$gid=$_GET['gid'];
if(isset($_SESSION['name'])){
    $sql='select uid from user where username="'.$_SESSION['name'].'"';
    $retval=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_array($retval,MYSQLI_ASSOC);
    $uid=$rows['uid'];
    $sql1='delete  from orders where uid="'.$uid.'"and gid="'.$gid.'"';
    $retval1=mysqli_query($conn,$sql1);
    $rows=mysqli_fetch_array($retval,MYSQLI_ASSOC);
    echo"<script>
    location.href='../view/order.php';
    </script>";
}

?>