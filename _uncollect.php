<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:login.php');
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $conn=require_once "config.php";
    $sql = "DELETE FROM collect WHERE user='".$_POST['user']."' and house='".$_POST['house']."'";
    if(mysqli_query($conn, $sql)){
        echo '<script>alert("成功取消收藏");history.back();</script>';
        exit;
    }else{
        echo "伺服器似乎出問題了 :" . mysqli_error($conn);
    }
}
?>