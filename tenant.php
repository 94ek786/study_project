<?php
$GLOBALS["n"] = 2;
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
    <script>
        function to_contract(){
            var i = document.getElementById('rng').value
            window.location = 'contract.php?rng=' + i;
        }
    </script>
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
        <h1>收藏</h1>
        <?php
        $conn=require_once "config.php";
        $sql = "SELECT * FROM collect WHERE user ='".$username."'";
        $result1 = mysqli_query($conn,$sql);
        while ($row = $result1->fetch_assoc()) {
            if(file_exists('img/Himg_'.$row['house'].'_1.png')){
                $imgUrl = 'img/Himg_'.$row['house'].'_1.png';
            }else if(file_exists('img/Himg_'.$row['house'].'_1.jpg')){
                $imgUrl = 'img/Himg_'.$row['house'].'_1.jpg';
            }else{
                $imgUrl = 'img/testimg16-9.png';
            }
            $sql = "SELECT * FROM house WHERE ID ='".$row['house']."'";
            $result = mysqli_query($conn,$sql);
            $data = mysqli_fetch_assoc($result);
            if($data['remain'] == 1){
                $color = 'green';
                $remain_D = '目前有空房';
            }else{
                $color = 'red';
                $remain_D = '目前無空房';
            }
            echo '
            <div class="row align-items-center" style="border-style:solid;border-width:1px;border-color:lightgray;cursor: pointer;" onclick="to_H('.$row['house'].')">
                <div class="col-md-2">
                    <img src="'.$imgUrl.'">
                </div>
                <div class="col-md-4">
                    <h4>'.$data['title'].'</h4>
                    <h7 style="color:gray;">'.$data['description'].'</h7>
                </div>
                <div class="col-md-1">
                    <form method="post" action="_uncollect.php">
                        <input type="hidden" name="user" value="'.$username.'">
                        <input type="hidden" name="house" value="'.$data['ID'].'">
                        <input class="btn btn-outline-warning" type="submit" name="submit" value="取消收藏">
                    </form>
                </div>
                <div class="col-md-1">
                    <div style="border:10px solid;width:20px;height:20px;border-radius:50%;color:'.$color.';"></div>'.$remain_D.'
                </div>
            </div><br>';
        }
        ?>
        <p></p>
        <div class="citydropdown dropdown">尋找租屋</div>
        <p></p>
        <?php
        if(isset($_GET['no_matamask']) != true){
            echo '
        <div class="row">
            <div class="col-md">
                輸入代碼進入簽約<input id="rng" type="text">
                <button class="btn btn-secondary" onclick="to_contract()">確認</button>
            </div>
        </div>
        <hr>';
        }
        ?>
    </section>
    <script>
        //偵測按下enter
        var element = document.getElementById("rng");
        element.addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                to_contract();
            }
        });
    </script>
    <section class="container">
        <?php
        if(isset($_GET['no_matamask']) != true){
            echo '<p></p>
                <h1>開啟的合約</h1>
                <p></p>
                <table class="table table-bordered">
                <tr>
                    <th scope="col-md-3">地址</th>
                    <th scope="col-md-2">首都</th>
                    <th scope="col-md-2">月租金</th>
                    <th scope="col-md-2">押金</th>
                    <th scope="col-md-3">簽約人地址</th>
                </tr>';
            $sql = "SELECT ID FROM contract WHERE tenant_ID ='".$GLOBALS["username"]."'";
            $result = mysqli_query($conn,$sql);
            $loop = 1;
            //$num = mysqli_num_rows($result);
            //echo '<script>alert("有'.$num.'筆資料");</script>';
            while ($row = $result->fetch_assoc()) {
                echo '
                    <tr>
                        <td> 
                            <div class="row">
                            <div id="houseaddress'.$loop.'"></div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                            <div id="housename'.$loop.'"></div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                            <div id="rent_per_month'.$loop.'"></div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                            <div id="securityDeposit'.$loop.'"></div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                            <div id="tenantVerify'.$loop.'"></div>
                            </div>
                        </td>
                    </tr>
                    <script>
                        $(document).ready(function() {
                            i = '.$row['ID'].';
                            houseaddress(i).then(v => {
                                document.getElementById("houseaddress'.$loop.'").innerHTML = v;
                            });
                            tenantVerify(i).then(v => {
                                document.getElementById("tenantVerify'.$loop.'").innerHTML = v;
                            });
                            housename(i).then(v => {
                                document.getElementById("housename'.$loop.'").innerHTML = v;
                            });
                            rent_per_month(i).then(v => {
                                document.getElementById("rent_per_month'.$loop.'").innerHTML = v;
                            });
                            securityDeposit(i).then(v => {
                                document.getElementById("securityDeposit'.$loop.'").innerHTML = v;
                            });
                        });
                    </script>';
                $loop++;
            }
            echo '</table>';
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