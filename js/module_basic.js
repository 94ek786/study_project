function Mnavbar(NULL) {
    document.getElementById('Mnavbar').innerHTML = '<div class="container">\
    <nav class="navbar fixed-top navbar-expand-lg navbar-light">\
        <div class="container-fluid">\
            <a class="navbar-brand" href="index.html">\
                首頁\
            </a>\
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">\
                <span class="navbar-toggler-icon"></span>\
            </button>\
            <div class="collapse navbar-collapse" id="navbarSupportedContent">\
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">\
                    <li class="nav-item">\
                        <a class="nav-link" href="#linktosearch">租屋</a>\
                    </li>\
                    <li class="nav-item dropdown">\
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">產品之類的</a>\
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">\
                            <li><a class="dropdown-item" href="https://www.youtube.com/watch?v=Py21QCndbxc">產品一號</a></li>\
                            <li><a class="dropdown-item" href="https://www.nvidia.com/zh-tw/geforce/graphics-cards/30-series/rtx-3060-3060ti/">慘品二號</a></li>\
                        </ul>\
                    </li>\
                </ul>\
                <span class="d-flex">\
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">\
                    <li class="nav-item">\
                        <a class="nav-link" href="#OTHERS">其他資訊</a>\
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

window.onload = function() {
    Mfooter();
    Mnavbar();
}