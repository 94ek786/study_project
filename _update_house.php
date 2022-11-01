<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:login.php');
}
$conn=require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $title = $_POST['title'];
    $address = $_POST['address'];
    $h_size = $_POST['h_size'];
    $type = $_POST['type'];
    $pattern = $_POST['pattern'];
    $deposit = $_POST['deposit'];
    $rent = $_POST['rent'];
    $utility_bill = $_POST['utility_bill'];
    $parking = $_POST['parking'];
    $furniture = $_POST['furniture'];
    $public = $_POST['public'];
    $others = $_POST['others'];
    $description = $_POST['description'];

    $sql="UPDATE house 
    SET title='".$title."', address='".$address."', h_size='".$h_size."', type='".$type."', pattern='".$pattern."', deposit='".$deposit."', rent='".$rent."', 
    utility_bill='".$utility_bill."', parking='".$parking."', furniture='".$furniture."', public='".$public."', others='".$others."', description='".$description."' 
    WHERE ID='".$_POST['ID']."';";
    if(mysqli_query($conn, $sql)){
        echo "房屋基本資料修改成功!3秒後將自動跳轉頁面<br>";
        echo "<a href='login.php'>未成功跳轉頁面請點擊此</a>";
        echo "<meta http-equiv='refresh' content='3;url=login.php'>";
        exit;
    }else{
        echo "伺服器似乎出問題了 :" . mysqli_error($conn);
    }

}
?>