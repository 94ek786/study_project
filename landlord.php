<?php
$GLOBALS["n"] = 4;
?>
<script>
    var landlord_n = 1;
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <?php include 'js/module_basic.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.6.0/web3.min.js"></script>
    <script type="text/javascript" src="js/contract_abi.js"></script>
    <script type="text/javascript" src="js/loadcontract.js"></script>
</head>

<body>
    <section class="container">
        <p></p>
        <?php
        $username = $GLOBALS["username"];
        echo "<h1>用戶".$username."</h1>";
        echo "<a class='btn btn-outline-danger' href='_logout.php'>點此登出</a>";
        if(isset($_GET['no_matamask']) == true){
            echo "<h1 style='color:red;'>需使用電腦並安裝MataMask才可將交易寫入區塊鍊</h1>";
        }
        ?>
        <p></p>
        <hr>
    </section>
    <section class="container">
        <p></p>
        <h1>出租中</h1>
        <p></p>
        <a class="btn btn-primary" href="enter_house.php">出租房屋</a>
        <p></p>
        <?php
        $conn=require_once "config.php";
        $sql = "SELECT * FROM house WHERE owner ='".$username."'";
        $result = mysqli_query($conn,$sql);
        while ($row = $result->fetch_assoc()) {
            if(file_exists('img/Himg_'.$row['ID'].'_1.png')){
                $imgUrl = 'img/Himg_'.$row['ID'].'_1.png';
            }else if(file_exists('img/Himg_'.$row['ID'].'_1.jpg')){
                $imgUrl = 'img/Himg_'.$row['ID'].'_1.jpg';
            }else{
                $imgUrl = 'img/testimg16-9.png';
            }
            if($row['remain'] == 1){
                $color = 'green';
                $remain_D = '目前尚有空房點';
                $remain_B = '切換為無空房';
            }else{
                $color = 'red';
                $remain_D = '目前尚無空房點';
                $remain_B = '切換為有空房';
            }
            if($row['img'] != 1){
                $img = '尚未上傳圖片!!';
            }else{
                $img = '';
            }
            echo '
            <div class="row align-items-center" style="border-style:solid;border-width:1px;border-color:lightgray;cursor: pointer;" onclick="to_H('.$row['ID'].')">
                <div class="col-md-2">
                    <img src="'.$imgUrl.'">
                </div>
                <div class="col-md-3">
                    <h4>'.$row['title'].'</h4>
                    <h7 style="color:gray;">'.$row['description'].'</h7>
                </div>
                <div class="col-md-2">
                    <div style="border:10px solid;width:20px;height:20px;border-radius:50%;color:'.$color.';"></div>
                    <form method="post" action="_remain_C.php">
                        <input type="hidden" name="ID" value="'.$row['ID'].'">
                        <input type="hidden" name="remain" value="'.$row['remain'].'">
                        '.$remain_D.'
                        <input class="btn btn-secondary" type="submit" name="submit" value="'.$remain_B.'">
                    </form>
                </div>
                <div class="col-md-1">
                    <form method="post" action="upload_img.php">
                        <input type="hidden" name="ID" value="'.$row['ID'].'">
                        <input class="btn btn-outline-secondary" type="submit" name="submit" value="上傳圖片">
                    </form>
                </div>
                <div class="col-md-1">
                    <form method="post" action="update_house.php">
                        <input type="hidden" name="ID" value="'.$row['ID'].'">
                        <input class="btn btn-outline-secondary" type="submit" name="submit" value="修改內容">
                    </form>
                </div>';
            if(isset($_GET['no_matamask']) != true){
                echo '
                <div class="col-md-1">
                    <form method="post" action="create_contract.php">
                        <input type="hidden" name="ID" value="'.$row['ID'].'">
                        <input class="btn btn-outline-danger" type="submit" name="submit" value="開啟合約">
                    </form>
                </div>';
            }
            echo '<div class="col-md-2" style="color:red;">'.$img.'</div></div><br>';
        }
        ?>
    <section class="container">
        <?php
        if(isset($_GET['no_matamask']) != true){
            echo '<p></p>
                <h1>開啟的合約</h1>
                <p></p>';
            $sql = "SELECT * FROM contract WHERE landlord_ID ='".$GLOBALS["username"]."'";
            $result = mysqli_query($conn,$sql);
            $loop = 1;
            while ($row = $result->fetch_assoc()) {
                echo '
                    <div class="row">
                        <div class="col-md">地址<div id="contract'.$loop.'"></div></div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            i = '.$row['ID'].';
                            loadcontract(i).then(v => {
                                document.getElementById("contract'.$loop.'").innerHTML = v;
                                // alert (v);   prints 60 after 4 seconds.
                            });
                        });
                    </script>';
                $loop++;
            }
        }
        ?>
    </section>
    <script>
        function resolveAfter2Seconds(x) {
            return new Promise(resolve => {
                setTimeout(() => {resolve(x);}, 2000);
            });
        }
    </script>
    <footer id="Mfooter">
    </footer>
</body>

</html>