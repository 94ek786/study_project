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
    <script type="text/javascript" src="js/search.js"></script>
</head>

<body>
    <section>
        <div class="container">
            <form action="search.php" method="get">
                <div class="row align-items-center" style="height:80px;border-width:1px; border-style:solid;border-color: lightgray;">
                    <div class="col-md-2">
                        <select required name="county">
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
                    </div>
                    <div class="col-md-2">
                        <input name="township" placeholder="輸入鄉鎮市區" value="<?php if(isset($_GET['township'])){echo $_GET['township'];} ?>">
                    </div>
                    <div class="col-md-6">
                        輸入價格區間：
                        <input name="rentL" placeholder="大於此價格"  value="<?php if(isset($_GET['rentL'])){echo $_GET['rentL'];} ?>">~
                        <input name="rentH" placeholder="小於此價格"  value="<?php if(isset($_GET['rentH'])){echo $_GET['rentH'];} ?>">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="submit" value="搜尋">
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-3 d-flex flex-column">
                    <button style="background-color: lightgray;border-color:gray" class="btn btn-primary filter_button d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#filter" aria-expanded="false" aria-controls="filter">
                        搜索條件
                    </button>
                    <div class="collapse d-md-block" id="filter">
                        <div class="card card-body" style="background-color: lightgray;">
                            搜尋細項
                        </div>
                    </div>
                </div>
                <div id="latest" class="col-md-9">
                    <div class="row">
                        <div class="objectA"></div>
                        <div class="objectA"></div>
                    </div>
                    <div class="row">
                        <div class="objectA"></div>
                        <div class="objectA"></div>
                    </div>
                    <div class="row">
                        <div class="objectA"></div>
                        <div class="objectA"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="Mfooter">
    </footer>
</body>

</html>