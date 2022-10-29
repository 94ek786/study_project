<?php
$GLOBALS["n"] = 1;
if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>合約</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <?php include 'js/module_basic.php'; ?>
    <style>
    </style>
</head>

<body>
    <?php
    $conn=require_once "config.php";
    $sql = "SELECT * FROM house WHERE ID ='".$_POST['ID']."'";
    $result = mysqli_query($conn,$sql);
    $data = $result->fetch_assoc();
    ?>
    <section class="container">
    <form method="post" action="_create_contract.php">
        <h2 class="col-md-12">房屋資料</h2>
        <div class="row">
            <h5 class="col-md-2">地址</h5>
            <input readonly="readonly" style="outline: none;border: 0;" required class="col-md-10" name="houseaddress" value="<?php echo $data['county'].$data['township'].$data['address']; ?>">
        </div>
        <br>
        <div class="row">
            <h5 class="col-md-2">坪數</h5>
            <input readonly="readonly" style="outline: none;border: 0;" required class="col-md-10" name="h_size" value="<?php echo $data['h_size']; ?>">
        </div>
        <br>
        <div class="row">
            <h5 class="col-md-2">類型</h5>
            <input readonly="readonly" style="outline: none;border: 0;" required class="col-md-10" name="type" value="<?php echo $data['type']; ?>">
        </div>
        <br>
        <div class="row">
            <h5 class="col-md-2">建物格局</h5>
            <input readonly="readonly" style="outline: none;border: 0;" required class="col-md-10" name="pattern" value="<?php echo $data['pattern']; ?>">
        </div>
        <br>
    </section>
    <section class="container">
        <h2 class="col-md-12">租賃資料</h2>
        <div class="row">
            <h5 class="col-md-2">租賃起始日</h5>
            <input required class="col-md-4" name="rent_Time_Start" type="date">
            <h5 class="col-md-2">租賃到期日</h5>
            <input required class="col-md-4" name="rent_Time_End" type="date">
        </div>
        <br>
        <div class="row">
            <h5 class="col-md-2">押金</h5>
            <input required class="col-md-10" name="deposit" value="<?php echo $data['deposit']; ?>">
        </div><br>
        <div class="row">
            <h5 class="col-md-2">每月租金</h5>
            <input required class="col-md-10" name="rent" placeholder="含管理費，公共水電費等每月固定費用" value="<?php echo $data['rent']; ?>">
        </div><br>
        <div class="row">
            <h5 class="col-md-2">水電費</h5>
            <input required class="col-md-10" name="utility_bill" placeholder="水電費之計價" value="<?php echo $data['utility_bill']; ?>">
        </div><br>
        <div class="row">
            <h5 class="col-md-2">出租人</h5>
            <input required class="col-md-10" name="landlord" placeholder="如馬一九">
        </div><br>
    </section>
    <section class="container">
        <h2 class="col-md-12">詳情</h2>
        <div class="row">
            <h5 class="col-md-2">租賃範圍</h5>
            <input required class="col-md-10" name="area" placeholder="全部/第＿層，＿號房">
        </div><br>
        <div class="row">
            <h5 class="col-md-2">車位</h5>
            <input required class="col-md-10" name="parking" placeholder="無/第＿層，第＿號">
        </div><br>
        <div class="row">
            <h5 class="col-md-2">家具設備</h5>
            <input required class="col-md-10" name="furniture" placeholder="如一張雙人床一張單人床兩個衣櫃一張桌子一張椅子" value="<?php echo $data['furniture']; ?>">
        </div><br>
        <div class="row">
            <h5 class="col-md-2">公共設施</h5>
            <input required class="col-md-10" name="public" placeholder="如電梯，飲水機" value="<?php echo $data['public']; ?>">
        </div><br>
    </section>
    <section class="container">
        <h2 class="col-md-12">其他</h2>
        <input required class="col-md-12" name="others" placeholder="如當家具損壞時之責任，公共設施使用規則等" value="<?php echo $data['others']; ?>">
        <p></p>
        <input type="submit" name="submit" value="確認">
    </form>
    </section>
    <footer id="Mfooter">
    </footer>
</body>
</html>