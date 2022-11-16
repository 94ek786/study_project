<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:login.php');
}
$conn=require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $tenant_ID = $_POST['tenant_ID'];
    $tenant = $_POST['tenant'];

    $sql="UPDATE contract SET tenant_ID='".$tenant_ID."', tenant='".$tenant."' WHERE rng='".$_POST['rng']."';";
    if(mysqli_query($conn, $sql)){
        echo "簽約成功<br>";
        echo "<a href='login.php'>回到會員頁面請擊此</a>";
        exit;
    }else{
        echo "伺服器似乎出問題了 :" . mysqli_error($conn);
    }

}
?>