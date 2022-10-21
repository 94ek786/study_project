<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");

function delete_img(){
    if(file_exists('Himg_'.$_POST['ID'].'_'.$loop.'.jpg')){
        unlink('Himg_'.$_POST['ID'].'_'.$loop.'.jpg');
    }else if(file_exists('Himg_'.$_POST['ID'].'_'.$loop.'png')){
        unlink('Himg_'.$_POST['ID'].'_'.$loop.'png');
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    for($loop=1;$loop<=12;$loop++){
        $file_num = 'img'.$loop;
        if($_FILES[$file_num]['type']=='image/png'){
            delete_img();
            move_uploaded_file($_FILES[$file_num]['tmp_name'],'img/Himg_'.$_POST['ID'].'_'.$loop.'.png');
            echo '第'.$loop.'張png圖片上傳成功<br>';
        }else if($_FILES[$file_num]['type']=='image/jpeg'){
            delete_img();
            move_uploaded_file($_FILES[$file_num]['tmp_name'],'img/Himg_'.$_POST['ID'].'_'.$loop.'.jpg');
            echo '第'.$loop.'張jpg圖片上傳成功<br>';
        }else{
        }
    }
    echo '5秒後自動跳轉';
    echo '<a href="login.php">未成功跳轉頁面請點擊此</a>';
    echo "<meta http-equiv='refresh' content='5;url=singup.php'>";
}
?>