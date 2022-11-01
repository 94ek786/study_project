<script>
    function copyEvent()
    {
        var str = document.getElementById('id');
        window.getSelection().selectAllChildren(str);
        document.execCommand("Copy")
    }
</script>

<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:login.php');
}
$conn=require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    function random_string($length = 32, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
        if (!is_int($length) || $length < 0) {
            return false;
        }
        $characters_length = strlen($characters) - 1;
        $string = '';
    
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, $characters_length)];
        }
        return $string;
    }
    session_start();
    $username = $_SESSION['username'];
    $houseaddress = $_POST['houseaddress'];
    $h_size = $_POST['h_size'];
    $type = $_POST['type'];
    $pattern = $_POST['pattern'];
    $rent_Time_Start = $_POST['rent_Time_Start'];
    $rent_Time_End = $_POST['rent_Time_End'];
    $deposit = $_POST['deposit'];
    $rent = $_POST['rent'];
    $utility_bill = $_POST['utility_bill'];
    $landlord = $_POST['landlord'];
    $area = $_POST['area'];
    $parking = $_POST['parking'];
    $furniture = $_POST['furniture'];
    $public = $_POST['public'];
    $others = $_POST['others'];
    $rng = 'xtIq48Ex401VHCsXfCkePOCey24ZTy0J';

    $loop = 0;
    while($loop == 0){
        $check="SELECT * FROM contract WHERE rng='".$rng."'";
        $result = mysqli_query($conn,$check);
        if(mysqli_num_rows($result)==0){
            $sql="INSERT INTO contract (landlord_ID, houseaddress, h_size, type, pattern, deposit, rent, utility_bill, parking, furniture, public, others, 
            rent_Time_Start, rent_Time_End, area, landlord, rng)
            VALUES('".$username."','".$houseaddress."','".$h_size."','".$type."','".$pattern."','".$deposit."','".$rent."','".$utility_bill."','".$parking."','".$furniture."',
            '".$public."','".$others."','".$rent_Time_Start."','".$rent_Time_End."','".$area."','".$landlord."','".$rng."')";
            if(mysqli_query($conn, $sql)){
                echo '<div align="center">合約創建成功<br>';
                echo '<input id="id" readonly="readonly" style="cursor: pointer;" onclick="copyEvent()"></input>'
                echo "<p></p><p></p><a href='login.php'>回到會員頁面請擊此</a></div>";
                exit;
            }else{
                echo "伺服器似乎出問題了 :" . mysqli_error($conn);
            }
            $loop = 1;
        }
        $rng = random_string();
    }
}
?>