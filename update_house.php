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
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <?php include 'js/module_basic.php'; ?>
</head>

<body>
    <?php
    $conn=require_once "config.php";
    $sql = "SELECT * FROM house WHERE ID ='".$_POST['ID']."'";
    $result = mysqli_query($conn,$sql);
    $data = $result->fetch_assoc();
    ?>
    <form method="post" action="_update_house.php">
        <input type="hidden" name="ID" value="<?php echo $_POST['ID']; ?>">
        <section class="container">
            <h1>修改房屋資料</h1>
            <h2 class="col-md-12">房屋資料</h2>
            <div class="row">
                <h5 class="col-md-2">標題</h5>
                <input required class="col-md-10" name="title" placeholder="" value="<?php echo $data['title']; ?>">
            </div>
            <br>
            <div class="row">   
                <h5 class="col-md-2">縣市</h5>
                <input required class="col-md-2" readonly="readonly" name="county" placeholder="鄉鎮市區，如內埔鄉" value="<?php echo $data['county']; ?>">
                <h5 class="col-md-2">行政區</h5>
                <input required class="col-md-2" readonly="readonly" name="township" placeholder="鄉鎮市區，如內埔鄉" value="<?php echo $data['township']; ?>">
            </div>
            <br>
            <div class="row">   
                <h5 class="col-md-2">地址</h5>
                <input required class="col-md-10" name="address" value="<?php echo $data['address']; ?>">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">坪數</h5>
                <input required class="col-md-10" name="h_size" placeholder="" type="number" value="<?php echo $data['h_size']; ?>">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">類型</h5>
                <input required class="col-md-10" name="type" placeholder="如公寓" value="<?php echo $data['type']; ?>">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">建物格局</h5>
                <input required class="col-md-10" name="pattern" placeholder="如三房一廳一廚房" value="<?php echo $data['pattern']; ?>">
            </div>
            <br>
        </section>
        <section class="container">
            <h2 class="col-md-12">租賃資料</h2>
            <div class="row">
                <h5 class="col-md-2">押金</h5>
                <input required class="col-md-10" name="deposit" placeholder="如50新台幣" value="<?php echo $data['deposit']; ?>">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">每月租金</h5>
                <input required class="col-md-10" name="rent" placeholder="含管理費，公共水電費等每月固定費用" type="number" value="<?php echo $data['rent']; ?>">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">水電費</h5>
                <input required class="col-md-10" name="utility_bill" placeholder="水電費之計價" value="<?php echo $data['utility_bill']; ?>">
            </div>
            <br>
        </section>
        <section class="container">
            <h2 class="col-md-12">詳情</h2>
            <div class="row">
                <h5 class="col-md-2">車位</h5>
                <select class="col-md-2" required name="parking" value="<?php echo $data['parking']; ?>">
                    <option selected value="無">無</option>
                    <option value="有">有</option>
                    <option value="需另租">需另租</option>
                </select>
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">家具設備</h5>
                <input required class="col-md-10" name="furniture" placeholder="如一張雙人床一張單人床兩個衣櫃一張桌子一張椅子" value="<?php echo $data['furniture']; ?>">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">公共設施</h5>
                <input required class="col-md-10" name="public" placeholder="如電梯，飲水機" value="<?php echo $data['public']; ?>">
            </div>
            <br>
        </section>
        <section class="container">
                <h2 class="col-md-12">其他</h2>
                <input required class="col-md-12" name="others" placeholder="如禁止養寵物或其他規則" value="<?php echo $data['others']; ?>">
                <p></p>
                <h2 class="col-md-12">屋主說明</h2>
                <input required class="col-md-12" name="description" placeholder="有的沒有的" value="<?php echo $data['description']; ?>">
                <p></p>
            <input type="submit" name="submit" value="確認">
        </section>
        </form>
    <footer id="Mfooter">
    </footer>
</body>
</html>