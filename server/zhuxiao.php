<?php
header('Content-type:text/html;charset=utf-8');
session_start();
session_destroy();
echo "<script type ='text/javascript'>
location.href='../main.php';
</script>";
?>