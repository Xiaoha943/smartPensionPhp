<?php

include("../../conn/conn.php");
// $gid=$_POST['gid'];
$mname=$_POST['mname'];
$mimg=$_POST['mimg'];
$des=$_POST['des'];
$uid=$_POST['uid'];
$time=$_POST['time'];
$sql="insert into message(mname,mimg,des,uid,time)values('".$mname."','".$mimg."','".$des."','".$uid."','".$time."')";
$retval=mysqli_query($conn,$sql);
if(!$retval){
    echo"0";
}else{
    echo"1";
}
?>