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
            <div class="col-md-1"><img style="cursor: pointer;" id="img1"  onclick="change_img(1)" src="<?php  show_img(1); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img2"  onclick="change_img(2)" src="<?php  show_img(2); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img3"  onclick="change_img(3)" src="<?php  show_img(3); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img4"  onclick="change_img(4)" src="<?php  show_img(4); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img5"  onclick="change_img(5)" src="<?php  show_img(5); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img6"  onclick="change_img(6)" src="<?php  show_img(6); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img7"  onclick="change_img(7)" src="<?php  show_img(7); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img8"  onclick="change_img(8)" src="<?php  show_img(8); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img9"  onclick="change_img(9)" src="<?php  show_img(9); ?>" ></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img10" onclick="change_img(10)" src="<?php show_img(10); ?>"></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img11" onclick="change_img(11)" src="<?php show_img(11); ?>"></div>
            <div class="col-md-1"><img style="cursor: pointer;" id="img12" onclick="change_img(12)" src="<?php show_img(12); ?>"></div>
        </div>
    </section>
    <p></p>
    <section class="container">
        <?php
        $conn=require_once "config.php";
        $sql = "SELECT * FROM house WHERE ID ='".$_GET['id']."'";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)==1){
            echo '<h1 class="col-md-12">'.$data['title'].'</h1>';
            echo '<div class="row"><div class="col-md-1">地址</div><div class="col-md-11">'.$data['county'].$data['township'].$data['address'].'</div></div>';
            echo '<div class="row"><div class="col-md-1">坪數</div><div class="col-md-3">'.$data['h_size'].'</div>';
            echo '<div class="col-md-1">類型</div><div class="col-md-3">'.$data['type'].'</div>';
            echo '<div class="col-md-1">建物格局</div><div class="col-md-3">'.$data['pattern'].'</div>';
            echo '</div><p></p><h3>費用</h3>';
            echo '<div class="row"><div class="col-md-1">押金</div><div class="col-md-3">'.$data['deposit'].'</div>';
            echo '<div class="col-md-1">租金</div><div class="col-md-3">'.$data['rent'].'</div>';
            echo '<div class="col-md-1">水電費</div><div class="col-md-3">'.$data['utility_bill'].'</div>';
            echo '</div><p></p><h3>設施設備</h3>';
            echo '<div class="row"><div class="col-md-1">車位</div><div class="col-md-3">'.$data['parking'].'</div>';
            echo '<div class="col-md-1">家具設備</div><div class="col-md-3">'.$data['furniture'].'</div>';
            echo '<div class="col-md-1">公共設施</div><div class="col-md-3">'.$data['public'].'</div>';
            echo '</div><p></p><h3>其他</h3>';
            echo '<div class="row">'.$data['others'].'</div>';
        }else{
            echo '<script>alert("無此房屋資料!");history.back();</script>';
        }
        ?>
    </section>
    <section class="container">
        <hr>
        <div class="col-md-12">
            <h2>屋主說明</h2>
        </div>
        <div class="col-md-12"><?php echo $data['description']; ?></div>
        <p><p><p></p></p></p>
        <div class="col-md-12">
            <button onclick="add_keep()">加入收藏</button>
            <button onclick="to_massage()">聯繫屋主</button>
        </div>
    </section>
    <section class="container">

    </section>
    <footer id="Mfooter"></footer>
</body>

</html>