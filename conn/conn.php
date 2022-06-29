<?php
header('Content-type:text/html;charset=utf-8');
$dbhost='localhost:3306';
$dbname='root';
$dbpwd='654321';
$conn=mysqli_connect($dbhost,$dbname,$dbpwd,'shop');
// if(!$conn){
//     die('数据库连接失败'.mysqli_error($conn));
// }else{
//     echo '数据库连接成功';
// }
?>