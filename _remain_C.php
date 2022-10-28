<?php
$conn=require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST['remain'] != 1){
        $sql = "UPDATE house SET remain='1' WHERE ID='".$_POST['ID']."'";
    }else{
        $sql = "UPDATE house SET remain='0' WHERE ID='".$_POST['ID']."'";
    }
    if(mysqli_query($conn, $sql)){
        echo "<a href='login.php'>未成功跳轉頁面請點擊此</a>";
        header('location:login.php');
        exit;
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }
}