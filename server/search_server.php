<?php
header('Content-type:text/html;charset=utf-8');
include("../conn/conn.php");
$value=$_POST['value'];
$sql='select * from goods where gname like "%'.$value.'%"';
$retval=mysqli_query($conn,$sql);
echo "<div class='back'>";
while($rows=mysqli_fetch_array($retval,MYSQLI_ASSOC)){
    echo " <div class='goods'> 
    <img class='goods_img' src='./img/" . $rows['img'] . "'> 
    <h3 class='titl'>" . $rows['gname'] . "</h3>
    <p class='goods_des'>" . $rows['des'] . "</p>
    <span class='price'>价格：" . $rows['price'] . "</span>
    <span class='vipprice'>会员价：" . $rows['vprice'] . "</span>
    <div class='shop_car'><button class='car'><a href='server/addshopcar_server.php?id=".$rows['tid']."&gid=" . $rows['gid'] . "'>加购物车</a></button>
    <button class='shop_button'> 直接购买</button></div>
    </div>";
}
echo "</div>";
?>