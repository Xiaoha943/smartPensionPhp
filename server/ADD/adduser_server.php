<?php

include("../../conn/conn.php");
$uname=$_POST['username'];
$pwd=$_POST['pwd'];
$tel=$_POST['tel'];
$address=$_POST['address'];
$qx=$_POST['qx'];

//echo $uname.$pwd.$tel.$address;
$pattern1='/^[A-Za-z0-9_]{4,12}$/';//帐号是否合法(字母开头，允许5-16字节，允许字母数字下划线)
$pattern2='/[A-Z]\w{5,11}/';
$pattern3='/1\d{10}/';
function checkStr2($str,$str2){
    return preg_match($str2,$str)?true:false;
}
$res1= checkStr2($uname,$pattern1);
$res2= checkStr2($pwd,$pattern2);
$res3= checkStr2($tel,$pattern3);
if($res1==true&&$res2==true&&$res3==false){
    echo 1;//手机号
}else if($res1==true&&$res2==false&&$res3==false){
    echo 2;//密码手机号
}else if($res1==false&&$res2==true&&$res3==true){
    echo 3;//用户名
}else if($res1==false&&$res2==false&&$res3==true){
    echo 4;//用户名 密码
 }else if($res1==false&&$res2==true&&$res3==false){
    echo 5;//用户名 手机号
 }else if($res1==false&&$res2==false&&$res3==false){
    echo 6;//用户名 手机号 密码
 }else if($res1==true&&$res2==false&&$res3==true){
    echo 7;//密码
}else if($res1==true&&$res2==true&&$res3==true){
    //echo 8;
    $sql ="insert into user(username,pwd,tel,address) values('".$uname."','".$pwd."','".$tel."','".$address."')";
    $retval=mysqli_query($conn,$sql);
    if(!$retval){
        echo 9;
    }else{
        echo 8;
    }
}

?>