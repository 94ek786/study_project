<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:login.php');
}
$conn=require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $username = $_SESSION['username'];
    $title = $_POST['title'];
    $county = $_POST['county'];
    $township = $_POST['township'];
    $address = $_POST['address'];
    $h_size = $_POST['h_size'];
    $type = $_POST['type'];
    $pattern = $_POST['pattern'];
    $deposit = $_POST['deposit'];
    $rent = $_POST['rent'];
    $utility_bill = $_POST['utility_bill'];
    $parking = $_POST['parking'];
    $furniture = $_POST['furniture'];
    $public = $_POST['public'];
    $others = $_POST['others'];
    $description = $_POST['description'];

    $sql="INSERT INTO house (owner, county, township, address, h_size, type, pattern, deposit, rent, utility_bill, parking, furniture, public, others, description, title, remain)
    VALUES('".$username."','".$county."','".$township."','".$address."','".$h_size."','".$type."','".$pattern."','".$deposit."','".$rent."','".$utility_bill."',
    '".$parking."','".$furniture."','".$public."','".$others."','".$description."','".$title."','0')";
    if(mysqli_query($conn, $sql)){
        $sql = "SELECT * FROM house WHERE owner = '".$username."' ORDER BY ID DESC LIMIT 1";
        $result = mysqli_query($conn,$sql);
        $data = $result->fetch_assoc();
        echo '
            <form method="post" action="upload_img.php">
                <input type="hidden" name="ID" value="'.$data['ID'].'">
                <input id="but" type="submit" name="submit" value="上傳圖片">
            </form>
            <script>document.getElementById("but").click();</script>';
        exit;
    }else{
        echo "伺服器似乎出問題了 :" . mysqli_error($conn);
    }

}
?>