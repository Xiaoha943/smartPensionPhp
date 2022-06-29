<?php
include("../../conn/conn.php");

$gid=$_POST['gid'];
$gname=$_POST['gname'];
$price=$_POST['price'];
$vprice=$_POST['vprice'];
$img=$_POST['img'];
$des=$_POST['des'];
$tid=$_POST['tid'];
$sql='update goods set gname="'.$gname.'",price="'.$price.'",vprice="'.$vprice.'",img="'.$img.'",des="'.$des.'",tid="'.$tid.'"where gid="'.$gid.'"';
$retval=mysqli_query($conn,$sql);
if(!$retval){
    die("错误".mysqli_error($conn));
}else{
    echo"1";
}
?>