<?php
function show_img($i){
    if(file_exists('img/Himg_'.$_GET['id'].'_'.$i.'.jpg')){
        echo 'img/Himg_'.$_GET['id'].'_'.$i.'.jpg';
    }elseif(file_exists('img/Himg_'.$_GET['id'].'_'.$i.'.png')){
        echo 'img/Himg_'.$_GET['id'].'_'.$i.'.png';
    }
}
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
        function change_img(i){
            var tep = document.getElementById('img'+i).src
            document.getElementById('mian_img').src = tep;
            for (let loop of document.querySelectorAll('.img')){
                loop.style.border = 'none';
            }
            document.getElementById('img'+i).style.border = 'solid blue';
        }
    </script>
</head>

<body>
    <section class="container">
        <div class="col-md-12 d-none d-md-block">
            <img id="mian_img" style="width:auto;height:500px;" src="<?php show_img(1); ?>" alt="">
        </div>
        <p></p>
        <div class="row gap-1">
            <div class="col-md-1"><img style="cursor: pointer;border-color: blue;border-style: solid;" id="img1"  class="img" onclick="change_img(1)" src="<?php  show_img(1); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img2"  class="img" onclick="change_img(2)" src="<?php  show_img(2); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img3"  class="img" onclick="change_img(3)" src="<?php  show_img(3); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img4"  class="img" onclick="change_img(4)" src="<?php  show_img(4); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img5"  class="img" onclick="change_img(5)" src="<?php  show_img(5); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img6"  class="img" onclick="change_img(6)" src="<?php  show_img(6); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img7"  class="img" onclick="change_img(7)" src="<?php  show_img(7); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img8"  class="img" onclick="change_img(8)" src="<?php  show_img(8); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img9"  class="img" onclick="change_img(9)" src="<?php  show_img(9); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img10" class="img" onclick="change_img(10)" src="<?php show_img(10); ?>"></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img11" class="img" onclick="change_img(11)" src="<?php show_img(11); ?>"></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img12" class="img" onclick="change_img(12)" src="<?php show_img(12); ?>"></div>
        </div>
    </section>
    <p></p>
    <section class="container">
        <?php
        $conn=require_once "config.php";
        $sql = "SELECT * FROM house WHERE ID ='".$_GET['id']."'";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        $sql = "SELECT * FROM users WHERE username ='".$data['owner']."'";
        $result = mysqli_query($conn,$sql);
        $ownerdata = mysqli_fetch_assoc($result);
        if($data['img'] != '1'){
            echo '<script>alert("此房屋尚未上傳圖片!");history.back();</script>';
        }
        if(mysqli_num_rows($result)==1){
            if($data['remain'] == 1){
                $color = 'green';
                $remain_D = '目前有空房';
            }else{
                $color = 'red';
                $remain_D = '目前無空房';
            }
            echo '<h1 class="col-md-12">'.$data['title'].'</h1>
                <hr>
                <div class="row">
                    <div class="col-md-9">
                        <h2>屋主說明</h2>
                        <div>'.$data['description'].'</div>
                        <p><p>
                        <table class="table table-bordered">
                            <tr class="border-3 border-secondary">
                                <td colspan="1" class="border-end-0 border-3 border-secondary">地址</td>
                                <td colspan="7" class="border-start border-0 border-secondary">'.$data['county'].$data['township'].$data['address'].'</td>
                                <td colspan="1" class="border-end-0 border-3 border-secondary">坪數</td>
                                <td colspan="3" class="border-start border-0 border-secondary">'.$data['h_size'].'</td>
                            </tr>
                            <tr class="border-3 border-secondary">
                                <td colspan="1" class="border-end-0 border-3 border-secondary">類型</td>
                                <td colspan="3" class="border-start border-0 border-secondary">'.$data['type'].'</td>
                                <td colspan="1" class="border-end-0 border-3 border-secondary">格局</td>
                                <td colspan="3" class="border-start border-0 border-secondary">'.$data['pattern'].'</td>
                                <td colspan="1" class="border-end-0 border-3 border-secondary">押金</td>
                                <td colspan="3" class="border-start border-0 border-secondary">'.$data['deposit'].'</td>
                            </tr>
                            <tr class="border-3 border-secondary">
                                <td colspan="1" class="border-end-0 border-3 border-secondary">租金</td>
                                <td colspan="3" class="border-start border-0 border-secondary">'.$data['rent'].'</td>
                                <td colspan="1" class="border-end-0 border-3 border-secondary">水電費</td>
                                <td colspan="3" class="border-start border-0 border-secondary">'.$data['utility_bill'].'</td>
                                <td colspan="1" class="border-end-0 border-3 border-secondary">車位</td>
                                <td colspan="3" class="border-start border-0 border-secondary">'.$data['parking'].'</td>
                            </tr>
                            <tr class="border-3 border-secondary">
                                <td colspan="2" class="border-end-0 border-3 border-secondary">家具設備</td>
                                <td colspan="4" class="border-start border-0 border-secondary">'.$data['furniture'].'</td>
                                <td colspan="2" class="border-end-0 border-3 border-secondary">公共設施</td>
                                <td colspan="4" class="border-start border-0 border-secondary">'.$data['public'].'</td>
                            </tr>
                            <tr class="border-3 border-secondary">
                                <td colspan="1"  class=" class="border-end-0 border-3 border-secondary">其他</td>
                                <td colspan="11" class=" class="border-start border-0 border-secondary">'.$data['others'].'</td>
                            </tr>
                            <tr style="visibility: collapse;" class="border-3 border-secondary">
                                <td class="col-md-1"></td>
                                <td class="col-md-1"></td>
                                <td class="col-md-1"></td>
                                <td class="col-md-1"></td>
                                <td class="col-md-1"></td>
                                <td class="col-md-1"></td>
                                <td class="col-md-1"></td>
                                <td class="col-md-1"></td>
                                <td class="col-md-1"></td>
                                <td class="col-md-1"></td>
                                <td class="col-md-1"></td>
                                <td class="col-md-1"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-3 border border-2">
                        <p><p>
                        <div style="border:10px solid;width:20px;height:20px;border-radius:50%;color:'.$color.';"></div><h4>'.$remain_D.'</h4>
                        <p></p><h3>聯絡屋主</h3>
                        電話號碼：'.$ownerdata['phone'].'<br>
                        電子郵件：'.$ownerdata['email'].'<br>
                        <p><p>
                        <form method="post" action="_add_keep.php">
                            <input type="hidden" name="ID" value="'.$_GET['id'].'">
                            <input class="btn btn-info" type="submit" name="submit" value="加入收藏">
                        </form>
                    </div>
                </div>';
        }else{
            echo '<script>alert("無此房屋資料!");history.back();</script>';
        }
        ?>
    </section>
    <section class="container">

    </section>
    <footer id="Mfooter"></footer>
</body>

</html>