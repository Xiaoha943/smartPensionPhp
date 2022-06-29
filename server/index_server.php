<?php
include('../conn/conn.php');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$sql="select * from user where username='".$name."'";
$retval=mysqli_query($conn,$sql);
//执行sql语句
$num=mysqli_num_rows($retval);
if($num==0){
    echo 1;
}else if($num==1){
    $sql1="select * from user where username='".$name."'and pwd='".$pwd."'";
    $num1=mysqli_num_rows(mysqli_query($conn,$sql1));
    if($num1==0){
        echo 2;
    }else{
        $rows=mysqli_fetch_array($retval,MYSQLI_ASSOC);
        session_start();
        $_SESSION['name']=$name;//将用户名存入session
        $_SESSION['qx']=$rows['qx'];//将权限存入session
        echo 3;
    }
}
?>