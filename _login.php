<?php
// Include config file
$conn=require_once "config.php";
 
// Define variables and initialize with empty values
$username=$_POST["username"];
$password=$_POST["password"];
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM users WHERE username ='".$username."'";
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)==1 && $password==$data["password"]){
        session_start();
        // Store data in session variables
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $data["id"];
        $_SESSION["username"] = $data["username"];
        header("location:member.php");
    }else{
            function_alert("帳號或密碼錯誤"); 
        }
}
    else{
        function_alert("Something wrong"); 
    }

    // Close connection
    mysqli_close($link);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='login.php';
    </script>"; 
    return false;
} 
?>