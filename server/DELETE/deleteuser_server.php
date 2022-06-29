<?php
include("../../conn/conn.php");
$uid=$_POST['uid'];
if(true){
    $sql='delete from user where uid="'.$uid.'"';
    $retval=mysqli_query($conn,$sql);
     if(!$retval){
        echo"0";
    }else {
        echo "1";
    }
}

?>