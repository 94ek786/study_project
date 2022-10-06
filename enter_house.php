<?php
$GLOBALS["n"] = 1;
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
</head>

<body>
    <section class="container">
        <h2 class="col-md-12">房屋資料</h2>
        <form method="post" action="_login.php">
        <div class="row">
            <h5 class="col-md-2">地址</h5>
            <input data-index="1" id="houseaddress" onkeydown="next_input(event)" required class="col-md-10" name="address" placeholder="如屏東縣內埔鄉學府路1號">
        </div>
        <div class="row">
            <h5 class="col-md-2">坪數</h5>
            <input data-index="2" id="housename" onkeydown="next_input(event)" required class="col-md-10" name="h_size" placeholder="如30坪">
        </div>
        <div class="row">
            <h5 class="col-md-2">類型</h5>
            <input data-index="3" id="securitydeposit" onkeydown="next_input(event)" required class="col-md-10" name="type" placeholder="如公寓">
        </div>
        <div class="row">
            <h5 class="col-md-2">建物格局</h5>
            <input data-index="4" id="rentcost" onkeydown="next_input(event)" required class="col-md-10" name="pattern" placeholder="如三房一廳一廚房">
        </div>
    </section>
    <section class="container">
        <h2 class="col-md-12">租賃資料</h2>
        <div class="row">
            <h5 class="col-md-2">押金</h5>
            <input data-index="7" onkeydown="next_input(event)" required class="col-md-10" name="deposit" placeholder="如50新台幣">
        </div>
        <div class="row">
            <h5 class="col-md-2">每月租金</h5>
            <input data-index="8" onkeydown="next_input(event)" required class="col-md-10" name="rent" placeholder="含管理費，公共水電費等每月固定費用">
        </div>
        <div class="row">
            <h5 class="col-md-2">水電費</h5>
            <input data-index="9" onkeydown="next_input(event)" required class="col-md-10" name="utility_bill" placeholder="水電費之計價">
        </div>
        <div class="row">
            <h5 class="col-md-2">出租人</h5>
            <input data-index="10" onkeydown="next_input(event)" required class="col-md-10" name="landlord" placeholder="如馬一九">
        </div>
        <div class="row">
            <h5 class="col-md-2">承租人</h5>
            <input data-index="11" onkeydown="next_input(event)" required class="col-md-10" name="tenant" placeholder="如菜一五">
        </div>
    </section>
    <section class="container">
        <h2 class="col-md-12">詳情</h2>
        <div class="row">
            <h5 class="col-md-2">租賃範圍</h5>
            <input data-index="12" onkeydown="next_input(event)" required class="col-md-10" name="area" placeholder="全部/第＿層，＿號房">
        </div>
        <div class="row">
            <h5 class="col-md-2">車位</h5>
            <input data-index="13" onkeydown="next_input(event)" required class="col-md-10" name="parking" placeholder="無/第＿層，第＿號">
        </div>
        <div class="row">
            <h5 class="col-md-2">家具設備</h5>
            <input data-index="14" onkeydown="next_input(event)" required class="col-md-10" name="furniture" placeholder="如一張雙人床一張單人床兩個衣櫃一張桌子一張椅子">
        </div>
        <div class="row">
            <h5 class="col-md-2">公共設施</h5>
            <input data-index="15" onkeydown="next_input(event)" required class="col-md-10" name="public" placeholder="如電梯，飲水機">
        </div>
    </section>
    <section class="container">
            <h2 class="col-md-12">其他</h2>
            <input data-index="16" onkeydown="next_input(event)" required class="col-md-12" name="others" placeholder="如公共設施使用規則或禁止養寵物等">
            <p></p>
            <h2 class="col-md-12">屋主說明</h2>
            <input data-index="17" onkeydown="next_input(event)" required class="col-md-12" name="description" placeholder="有的沒有的">
            <p></p>
            <div class="row">
                <div class="col-md">
                    
                </div>
            </div>
        <input type="submit" data-index="18" name="submit" value="確認">
        </form>
    </section>
    <footer id="Mfooter">
    </footer>
</body>
</html>