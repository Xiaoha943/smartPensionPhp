<?php
header('Content-type:text/html;charset=utf-8');
include("../conn/conn.php");
$value=$_POST['value'];
$sql='select * from message where mname like "%'.$value.'%"';
$retval=mysqli_query($conn,$sql);
while($rows=mysqli_fetch_array($retval,MYSQLI_ASSOC)){
    echo "
                                <div class='items'>
    
                                <div class='content-box'>
    
                                    <div class='posts-gallery-img'> <a href='javascript:0'><img class='thumbnail' src='./img/message/" . $rows['mimg'] . "' alt='" . $rows['mname'] . "' /></a> </div>
    
                                    <div class='posts-gallery-content'>
    
                                        <h2 target='_blank'>" . $rows['mname'] . "</h2>
    
                                        <div class='posts-gallery-text'>" . $rows['des'] . "</div>
    
                                        <div class='posts-default-info posts-gallery-info'>
    
                                            <ul>
    
                                                <li class='ico-cat'><i class='iconfont icon-liebiao'></i> <a href='javascript:0'>养生文章</a></li>
    
                                                <li class='ico-time'><i class='iconfont icon-iconfontshijian'></i> " . $rows['time'] . "</li>
    
                                                <li class='ico-eye'><i class='iconfont iconchakan'></i> 1</li>
    
                                            </ul>
    
                                        </div>
    
                                    </div>
    
                                </div>
    
                            </div> ";
}
?>

