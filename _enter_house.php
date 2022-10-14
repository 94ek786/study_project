<?php
$conn=require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $username = $_SESSION{'username'};
    $county = $_POST['county'];
    $township = $_POST['township'];
    $address = $_POST['address'];
    $h_size = $_POST['h_size'];
    $type = $_POST['type'];
    $pattern = $_POST['pattern'];
    $deposit = $_POST['deposit'];
    $rent = $_POST['rent'];
    $utility_bill = $_POST['utility_bill'];
    $area = $_POST['area'];
    $parking = $_POST['parking'];
    $furniture = $_POST['furniture'];
    $public = $_POST['public'];
    $others = $_POST['others'];
    $description = $_POST['description'];

    $sql="INSERT INTO house (owner, county, township, address, h_size, type, pattern, deposit, rent, utility_bill, area, parking, furniture, public, others, description)
    VALUES('".$username."','".$county."','".$township."','".$address."','".$h_size."','".$type."','".$pattern."','".$deposit."','".$rent."','".$utility_bill."',
    '".$area."','".$parking."','".$furniture."','".$public."','".$others."','".$description."')";
    if(mysqli_query($conn, $sql)){
        echo "登入成功!3秒後將自動跳轉頁面<br>";
        echo "<a href='login.php'>未成功跳轉頁面請點擊此</a>";
        echo "<meta http-equiv='refresh' content='3;url=login.php'>";
        exit;
    }else{
        echo "Error creating table: " . mysqli_error($conn);
    }

}
?>