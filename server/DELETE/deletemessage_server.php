<?php
include("../../conn/conn.php");
$mid=$_POST['mid'];
if(true){
    $sql='delete from message where mid="'.$mid.'"';
    $retval=mysqli_query($conn,$sql);
     if(!$retval){
        echo"0";
    }else {
        echo "1";
    }
}

?>