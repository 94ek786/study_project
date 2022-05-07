function Mnavbar(NULL) {
    document.getElementById('Mnavbar').innerHTML = '<div class="container">\
    <nav class="navbar fixed-top navbar-expand-md navbar-light">\
        <div class="container-fluid">\
            <a class="navbar-brand" href="index.html">\
                首頁\
            </a>\
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">\
                <span class="navbar-toggler-icon"></span>\
            </button>\
            <div class="collapse navbar-collapse" id="navbarSupportedContent">\
                <ul class="navbar-nav me-auto">\
                    <li class="nav-item dropdown citydropdown mb-6">租屋\
                    </li>\
                    <li class="nav-item dropdown">\
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">其他連結</a>\
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">\
                            <li><a class="dropdown-item" href="https://www.youtube.com/watch?v=Py21QCndbxc">一號</a></li>\
                            <li><a class="dropdown-item" href="https://youtu.be/Zx4nMqR3jAk">二號</a></li>\
                        </ul>\
                    </li>\
                </ul>\
                <span class="d-flex">\
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">\
                    <li class="nav-item">\
                        <a class="nav-link" href="login.html">登入</a>\
                    </li>\
                    </ul>\
                </span>\
            </div>\
        </div>\
    </nav>\
</div>'
}

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

function empty(NULL) {
    document.getElementById('empty').innerHTML = '<div style="height:56px;background: gray">empty</div>'
}

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
                                        <li><a class="dropdown-item" href="search.html?city=台北市">台北市</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=新北市">新北市</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=桃園市">桃園市</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=新竹市">新竹市</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=新竹縣">新竹縣</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=宜蘭縣">宜蘭縣</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=基隆市">基隆市</a></li>\
                                    </div>\
                                    <div class="col">\
                                        <li class="dropdown-header">中部</li>\
                                        <li><a class="dropdown-item" href="search.html?city=台中市">台中市</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=彰化縣">彰化縣</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=雲林縣">雲林縣</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=苗栗縣">苗栗縣</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=南投縣">南投縣</a></li>\
                                    </div>\
                                    <div class="col">\
                                        <li class="dropdown-header">南部</li>\
                                        <li><a class="dropdown-item" href="search.html?city=高雄市">高雄市</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=台南市">台南市</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=嘉義市">嘉義市</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=嘉義縣">嘉義縣</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=屏東縣">屏東縣</a></li>\
                                    </div>\
                                    <div class="col">\
                                        <li class="dropdown-header">東部及外島</li>\
                                        <li><a class="dropdown-item" href="search.html?city=台東縣">台東縣</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=花蓮縣">花蓮縣</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=澎湖縣">澎湖縣</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=金門縣">金門縣</a></li>\
                                        <li><a class="dropdown-item" href="search.html?city=連江縣">連江縣</a></li>\
                                    </div>\
                            </div>\
                        </ul>';
    }
}

$(document).ready(function() {
    try {
        Mnavbar();
        empty();
    } catch { console.log(naverror) }
    try {
        Mfooter();
    } catch {}
    try {
        citydropdown();
    } catch {}
});