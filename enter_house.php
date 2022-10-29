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
    <form method="post" action="_enter_house.php">
        <section class="container">
            <h2 class="col-md-12">房屋資料</h2>
            <div class="row">
                <h5 class="col-md-2">標題</h5>
                <input required class="col-md-10" name="title" placeholder="">
            </div>
            <br>
            <div class="row">   
                <h5 class="col-md-2">縣市</h5>
                <select class="col-md-2" required name="county">
                    <option label value="">請先選擇縣市</option>
                    <option value="台北市">台北市</option>
                    <option value="新北市">新北市</option>
                    <option value="桃園市">桃園市</option>
                    <option value="新竹市">新竹市</option>
                    <option value="新竹縣">新竹縣</option>
                    <option value="宜蘭縣">宜蘭縣</option>
                    <option value="基隆市">基隆市</option>
                    <option value="台中市">台中市</option>
                    <option value="彰化縣">彰化縣</option>
                    <option value="雲林縣">雲林縣</option>
                    <option value="苗栗縣">苗栗縣</option>
                    <option value="南投縣">南投縣</option>
                    <option value="高雄市">高雄市</option>
                    <option value="台南市">台南市</option>
                    <option value="嘉義市">嘉義市</option>
                    <option value="嘉義縣">嘉義縣</option>
                    <option value="屏東縣">屏東縣</option>
                    <option value="台東縣">台東縣</option>
                    <option value="花蓮縣">花蓮縣</option>
                    <option value="澎湖縣">澎湖縣</option>
                    <option value="金門縣">金門縣</option>
                    <option value="連江縣">連江縣</option>
                </select>
                <h5 class="col-md-2">行政區</h5>
                <input required class="col-md-2" name="township" placeholder="鄉鎮市區，如內埔鄉">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">地址</h5>
                <input required class="col-md-10" name="address" placeholder="如學府路1號">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">坪數</h5>
                <input required class="col-md-10" name="h_size" placeholder="" type="number">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">類型</h5>
                <input required class="col-md-10" name="type" placeholder="如公寓">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">建物格局</h5>
                <input required class="col-md-10" name="pattern" placeholder="如三房一廳一廚房">
            </div>
            <br>
        </section>
        <section class="container">
            <h2 class="col-md-12">租賃資料</h2>
            <div class="row">
                <h5 class="col-md-2">押金</h5>
                <input required class="col-md-10" name="deposit" placeholder="如50">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">每月租金</h5>
                <input required class="col-md-10" name="rent" placeholder="含管理費，公共水電費等每月固定費用" type="number">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">水電費</h5>
                <input required class="col-md-10" name="utility_bill" placeholder="水電費之計價">
            </div>
            <br>
        </section>
        <section class="container">
            <h2 class="col-md-12">詳情</h2>
            <div class="row">
                <h5 class="col-md-2">車位</h5>
                <select class="col-md-2" required name="parking">
                    <option selected value="無">無</option>
                    <option value="有">有</option>
                    <option value="需另租">需另租</option>
                </select>
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">家具設備</h5>
                <input required class="col-md-10" name="furniture" placeholder="如一張雙人床一張單人床兩個衣櫃一張桌子一張椅子">
            </div>
            <br>
            <div class="row">
                <h5 class="col-md-2">公共設施</h5>
                <input required class="col-md-10" name="public" placeholder="如電梯，飲水機">
            </div>
            <br>
        </section>
        <section class="container">
                <h2 class="col-md-12">其他</h2>
                <input required class="col-md-12" name="others" placeholder="如禁止養寵物或其他規則">
                <p></p>
                <h2 class="col-md-12">屋主說明</h2>
                <input required class="col-md-12" name="description" placeholder="有的沒有的">
                <p></p>
            <input type="submit" name="submit" value="確認">
        </section>
        </form>
    <footer id="Mfooter">
    </footer>
</body>
</html>