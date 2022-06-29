<?php
include("../../conn/conn.php");
$uid=$_POST['uid'];
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
$tel=$_POST['tel'];
$address=$_POST['address'];
$qx=$_POST['qx'];
$sql='update user set username="'.$uname.'",pwd="'.$pwd.'",tel="'.$tel.'",address="'.$address.'",qx="'.$qx.'"where uid="'.$uid.'"';
$retval=mysqli_query($conn,$sql);
if(!$retval){
    die("错误".mysqli_error($conn));
}else{
    echo"1";
}
?>