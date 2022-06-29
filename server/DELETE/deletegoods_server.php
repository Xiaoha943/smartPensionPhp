<?php
include("../../conn/conn.php");
$gid=$_POST['gid'];
if(true){
    $sql='delete from goods where gid="'.$gid.'"';
    $retval=mysqli_query($conn,$sql);
     if(!$retval){
        echo"0";
    }else {
        echo "1";
    }
}

?>