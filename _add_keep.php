<?php
$GLOBALS['n'] = 2;
include 'js/module_basic.php';
$conn=require_once "config.php";
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:login.php');
}
if($GLOBALS['username'] != 'none'){
    $check="SELECT * FROM collect WHERE user='".$GLOBALS['username']."' and house='".$_POST['ID']."'";
    $result = mysqli_query($conn,$check);
    if(mysqli_num_rows($result)==0){
        $sql="INSERT INTO collect (user, house) VALUES('".$GLOBALS['username']."','".$_POST['ID']."')";
        if(mysqli_query($conn, $sql)){
            echo '<script>alert("收藏成功");history.back();</script>';
            exit;
        }else{
            echo "伺服器似乎出問題了 :" . mysqli_error($conn);
        }
    }else{
        echo '<script>alert("已收藏過");history.back();</script>';
    }
}else{
    header('location:login.php');
}
?>