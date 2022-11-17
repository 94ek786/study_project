<?php
//模塊化
//網頁載入前判斷
session_start();
//如果已登入抓取登入資料
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    $GLOBALS['loggedin'] = $_SESSION['loggedin'];
    $GLOBALS['type'] = $_SESSION['type'];
    $GLOBALS['username']=$_SESSION['username'];
}else{
    $GLOBALS['loggedin'] = false;
    $GLOBALS['username'] = 'none';
}
//
if(isset($GLOBALS['n']) != true){
    $GLOBALS['n'] = 0;
}
//將未登入而進入須登入網頁時跳轉至登入頁面
if($GLOBALS['n'] == 1){
    if(isset($_SESSION['loggedin']) != true){
        header('location:login.php');
    }
}
//只有房客可進入的葉面
if($GLOBALS['n'] == 2){
    if(isset($_SESSION['loggedin']) != true){
        header('location:login.php');
    }
    if($_SESSION['type'] != 'tenant'){
        header('location:login.php');
    }
}
//若已登入進入登入與註冊頁面時跳轉至會員中心
if($GLOBALS['n'] == 3){
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        if($_SESSION['type'] == 'tenant'){
            header('location:tenant.php');
            exit;
        }else{
            header('location:landlord.php');
            exit;
        }
    }
}
//只有房東可進入的葉面
if($GLOBALS['n'] == 4){
    if(isset($_SESSION['loggedin']) != true){
        header('location:login.php');
    }
    if($_SESSION['type'] != 'landlord'){
        header('location:login.php');
    }
}
?>
<script>


//導覽列
function Mnavbar(NULL) {
    document.getElementById('Mnavbar').innerHTML = '<div class="container">\
    <nav class="navbar fixed-top navbar-expand-md navbar-light">\
        <div class="container-fluid">\
            <a class="navbar-brand" href="index.php">\
                首頁\
            </a>\
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">\
                <span class="navbar-toggler-icon"></span>\
            </button>\
            <div class="collapse navbar-collapse" id="navbarSupportedContent">\
                <ul class="navbar-nav me-auto">\
                    <li class="nav-item dropdown citydropdown mb-6">租屋\
                    </li>\
                </ul>\
                <span class="d-flex">\
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">\
                    <li class="nav-item ilogin">\
                        <a class="nav-link" style="cursor: pointer" href="login.php?lpath=asdf">登入</a>\
                    </li>\
                    </ul>\
                </span>\
            </div>\
        </div>\
    </nav>\
</div>'
}

//至底資訊
function Mfooter(NULL) {
    document.getElementById('Mfooter').innerHTML = '<a name="OTHERS"></a>\
    <div class="container">\
        <div class="row">\
            <div class="col-md-4 text-start">\
                <img src="img/logo.png">\
                <p>some description</p>\
            </div>\
            <div class="col-md-4 text-start">\
                <ul>\
                    <li>\
                        <h4><a href="https://www.youtube.com/watch?v=uoqJy_AEt-E">連結</a></h4>\
                    </li>\
                    <li>\
                        <h4><a href="https://www.youtube.com/watch?v=Q5WL-1Dn0Fg">跟連結</a></h4>\
                    </li>\
                    <li>\
                        <h4><a href="https://www.youtube.com/watch?v=6wDw1WVCHRo">還有連結</a></h4>\
                    </li>\
                </ul>\
            </div>\
            <div class="col-md-4 text-start">\
                <h4>聯絡我們</h4>\
                <p>100台北市中正區重慶南路一段122號<br> E-Mail: <a href="mailto:address@gmail.com">address@gmail.com</a></p>\
            </div>\
        </div>\
    </div>'
}

//因導覽列所需的空白格 讓排版正常
function empty(NULL) {
    document.getElementById('empty').innerHTML = '<div style="height:56px;background: gray">empty</div>'
}

//快速到收尋區
//導覽列與Index有用到
function citydropdown(NULL) {
    for (let loop of document.querySelectorAll('.citydropdown')) {
        i = loop.innerHTML
        loop.innerHTML = '\
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">\
                            ' + i + '\
                        </button>\
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">\
                            <div class="row">\
                                    <div class="col">\
                                        <li class="dropdown-header">北部</li>\
                                        <li><a class="dropdown-item" href="search.php?county=台北市">台北市</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=新北市">新北市</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=桃園市">桃園市</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=新竹市">新竹市</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=新竹縣">新竹縣</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=宜蘭縣">宜蘭縣</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=基隆市">基隆市</a></li>\
                                    </div>\
                                    <div class="col">\
                                        <li class="dropdown-header">中部</li>\
                                        <li><a class="dropdown-item" href="search.php?county=台中市">台中市</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=彰化縣">彰化縣</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=雲林縣">雲林縣</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=苗栗縣">苗栗縣</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=南投縣">南投縣</a></li>\
                                    </div>\
                                    <div class="col">\
                                        <li class="dropdown-header">南部</li>\
                                        <li><a class="dropdown-item" href="search.php?county=高雄市">高雄市</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=台南市">台南市</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=嘉義市">嘉義市</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=嘉義縣">嘉義縣</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=屏東縣">屏東縣</a></li>\
                                    </div>\
                                    <div class="col">\
                                        <li class="dropdown-header">東部及外島</li>\
                                        <li><a class="dropdown-item" href="search.php?county=台東縣">台東縣</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=花蓮縣">花蓮縣</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=澎湖縣">澎湖縣</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=金門縣">金門縣</a></li>\
                                        <li><a class="dropdown-item" href="search.php?county=連江縣">連江縣</a></li>\
                                    </div>\
                            </div>\
                        </ul>';
    }
}

//更改已登入的navbar介面
function is_login() {
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
        echo 'var loggedin = true;';
    }else{
        echo 'var loggedin = false;';
    }
    ?>
    if (loggedin) {
        for (let loop of document.querySelectorAll('.ilogin')) {
            loop.classList.add('dropdown');
            loop.innerHTML = '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $GLOBALS['username']?></a>\
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">\
                <li><a class="dropdown-item" href="_member.php">會員中心</a></li>\
                <li><a class="dropdown-item" href="_logout.php">登出</a></li>\
            </ul>';
        }
    }
}

//模塊化的房屋簡介及連結
function objectA(id, rent, title, description) {
    for (let loop of document.querySelectorAll('.objectA')) {
        loop.innerHTML = '\
                            <div class="outer">\
                                <a href="house.php?id=' + String(id) + '">\
                                    <div class="upper">\
                                        <img src="img/Himg_'+ String(id) +'_1.png" onerror="this.src=`img/Himg_'+ String(id) +'_1.jpg`" alt="一張圖片">\
                                        <div class="innertext">\
                                            <span>'+ String(rent) +'</span>\
                                        </div>\
                                    </div>\
                                    <div class="lower">\
                                        <h3>'+ title +'</h3>\
                                        <span>'+ description +'</span>\
                                    </div>\
                                </a>\
                            </div>';
        loop.className = 'col-md';
    }
}

function to_H(i){
    location.href='house.php?id=' + i;
};

console.log
    //載入網站後執行此程式碼
$(document).ready(function() {
    try {
        Mnavbar();
        empty();
    } catch { console.log('naverror') }
    try {
        //Mfooter();
    } catch {}
    try {
        citydropdown();
    } catch {}
    try {
        is_login();
    } catch {}
});

//在開頭加上導覽列與空白格
document.write('\
    <header id="Mnavbar">\
    </header>\
    <div id="empty"></div>');
</script>