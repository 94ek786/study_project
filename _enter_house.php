<?php
$conn=require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $username = $_SESSION{'username'};
    $address = $_POST['address'];
    $h_size=$_POST['h_size'];
    $type=$_POST['type'];
    $pattern=$_POST['pattern'];
    $rent_Time_Start=$_POST['rent_Time_Start'];
    $rent_Time_End=$_POST['rent_Time_End'];
    $deposit=$_POST['deposit'];
    $rent=$_POST['rent'];
    $utility_bill=$_POST['utility_bill'];
    $landlord=$_POST['landlord'];
    $tenant=$_POST['tenant'];
    $area=$_POST['area'];
    $parking=$_POST['parking'];
    $furniture=$_POST['furniture'];
    $public=$_POST['public'];
    $others=$_POST['others'];
    $description=$_POST['description'];

    $sql="INSERT INTO house (username, password, email, type)
    VALUES('".$username."','".$password."','".$email."','".$type."')";
    if(mysqli_query($conn, $sql)){
        echo "註冊成功!3秒後將自動跳轉頁面<br>";
        echo "<a href='login.php'>未成功跳轉頁面請點擊此</a>";
        echo "<meta http-equiv='refresh' content='3;url=login.php'>";
        exit;
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }

}
?>