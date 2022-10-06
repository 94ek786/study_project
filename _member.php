<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    if($_SESSION["type"] == "tenant"){
        header("location:tenant.php");
        exit;
    }else{
        header("location:landlord.php");
        exit;
    }
}else{
    header("location:login.php");
}
?>