<?php

include("../../conn/conn.php");
// $gid=$_POST['gid'];
$gname=$_POST['gname'];
$price=$_POST['price'];
$vprice=$_POST['vprice'];
$img=$_POST['img'];
$des=$_POST['des'];
$tid=$_POST['tid'];
$sql="insert into goods(gname,price,vprice,img,des,tid)values('".$gname."','".$price."','".$vprice."','".$img."','".$des."','".$tid."')";
$retval=mysqli_query($conn,$sql);
if(!$retval){
    echo"0";
}else{
    echo"1";
}
?>