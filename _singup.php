<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:login.php');
}
$conn=require_once "config.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $email=$_POST["email"];
    $type=$_POST["type"];
    $name=$_POST["name"];
    //檢查帳號是否重複
    $check="SELECT * FROM users WHERE username='".$username."'";
    $result = mysqli_query($conn,$check);
    if(mysqli_num_rows($result)==0){
        $sql="INSERT INTO users (username, password, email, type, name)
            VALUES('".$username."','".$password."','".$email."','".$type."','".$name."')";
        
        if(mysqli_query($conn, $sql)){
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo "<a href='login.php'>未成功跳轉頁面請點擊此</a>";
            echo "<meta http-equiv='refresh' content='3;url=login.php'>";
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
        echo "<a href='singup.php'>未成功跳轉頁面請點擊此</a>";
        echo "<meta http-equiv='refresh' content='3;url=singup.php'>";
        exit;
    }
}


mysqli_close($conn);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='login.php';
    </script>"; 
    
    return false;
} 
?>