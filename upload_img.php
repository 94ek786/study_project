<?php

if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('location:login.php');
}

function show_img($i){
    if(file_exists('img/Himg_'.$_POST['ID'].'_'.$i.'.jpg')){
        echo 'img/Himg_'.$_POST['ID'].'_'.$i.'.jpg';
        return false;
    }elseif(file_exists('img/Himg_'.$_POST['ID'].'_'.$i.'.png')){
        echo 'img/Himg_'.$_POST['ID'].'_'.$i.'.png';
        return false;
    }
    return true;
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
</head>

<body>
    <div class="container">
        <H3>上傳圖片</H3>
        <form action="_upload_img.php" method="post" enctype="multipart/form-data">
            <p style="color:red;">*第一張圖片必要的<br>最多12張照片<br>只能上傳.png或.jpg檔</p>
            1. <input <?php if(show_img(1)){echo 'required';} ?> type="file" name="img1" ><div class="col-md-5"><img src="<?php show_img(1); ?>"></div><p></p>
            2. <input type="file" name="img2" ><div class="col-md-5"><img src="<?php show_img(2); ?>"></div><p></P>
            3. <input type="file" name="img3" ><div class="col-md-5"><img src="<?php show_img(3); ?>"></div><p></P>
            4. <input type="file" name="img4" ><div class="col-md-5"><img src="<?php show_img(4); ?>"></div><p></P>
            5. <input type="file" name="img5" ><div class="col-md-5"><img src="<?php show_img(5); ?>"></div><p></P>
            6. <input type="file" name="img6" ><div class="col-md-5"><img src="<?php show_img(6); ?>"></div><p></P>
            7. <input type="file" name="img7" ><div class="col-md-5"><img src="<?php show_img(7); ?>"></div><p></P>
            8. <input type="file" name="img8" ><div class="col-md-5"><img src="<?php show_img(8); ?>"></div><p></P>
            9. <input type="file" name="img9" ><div class="col-md-5"><img src="<?php show_img(9); ?>"></div><p></p>
            10.<input type="file" name="img10"><div class="col-md-5"><img src="<?php show_img(10);?>"></div><p></p>
            11.<input type="file" name="img11"><div class="col-md-5"><img src="<?php show_img(11);?>"></div><p></p>
            12.<input type="file" name="img12"><div class="col-md-5"><img src="<?php show_img(12);?>"></div><p></p>
            <input type="hidden" name="ID" value="<?php echo $_POST['ID']; ?>">
            <input type="submit" name="submit" value="圖片上傳">
        </form>
    </div>
</body>
</html>