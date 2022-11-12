<?php
$GLOBALS['n'] = 1;
include 'module_basic.php';
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:login.php');
}
?>