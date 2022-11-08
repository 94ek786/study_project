<?php
$GLOBALS["n"] = 4;
?>
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
    <script>
        function to_H(i){
            location.href='house.php?id=' + i;
        };
    </script>
</head>

<body>
    <section class="container">
        <p></p>
        <?php
        $username = $GLOBALS["username"];
        echo "<h1>用戶".$username."</h1>";
        ?>
        <p></p>
        <hr>
    </section>
    <section class="container">
        <p></p>
        <h1>出租中</h1>
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
            echo '
            <div class="row align-items-center" style="border-style:solid;border-width:1px;border-color:lightgray;cursor: pointer;" onclick="to_H('.$row['ID'].')">
                <div class="col-md-2">
                    <img src="'.$imgUrl.'">
                </div>
                <div class="col-md-4">
                    <h4>'.$row['title'].'</h4>
                    <h7 style="color:gray;">'.$row['description'].'</h7>
                </div>
                <div class="col-md-2">
                    <div style="border:10px solid;width:20px;height:20px;border-radius:50%;color:'.$color.';"></div>
                    <form method="post" action="_remain_C.php">
                        <input type="hidden" name="ID" value="'.$row['ID'].'">
                        <input type="hidden" name="remain" value="'.$row['remain'].'">
                        '.$remain_D.'
                        <input type="submit" name="submit" value="'.$remain_B.'">
                    </form>
                </div>
                <div class="col-md-1">
                    <form method="post" action="upload_img.php">
                        <input type="hidden" name="ID" value="'.$row['ID'].'">
                        <input type="submit" name="submit" value="上傳圖片">
                    </form>
                </div>
                <div class="col-md-1">
                    <form method="post" action="update_house.php">
                        <input type="hidden" name="ID" value="'.$row['ID'].'">
                        <input type="submit" name="submit" value="修改內容">
                    </form>
                </div>
                <div class="col-md-1">
                    <form method="post" action="create_contract.php">
                        <input type="hidden" name="ID" value="'.$row['ID'].'">
                        <input type="submit" name="submit" value="開啟合約">
                    </form>
                </div>
            </div><br>';
        }
        ?>
        <a href="enter_house.php">出租房屋</a>
        <hr>
    </section>
</body>

</html>