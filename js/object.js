function objectA(NULL) {
    i = 0;
    for (let loop of document.querySelectorAll('.objectA')) {
        i++;
        loop.innerHTML = '\
                            <div class="outer">\
                                <a href="house.html?id=' + String(i) + '">\
                                    <div class="upper">\
                                        <img src="img/testimg16-9.png">\
                                        <div class="innertext">\
                                            <span>價格</span>\
                                        </div>\
                                    </div>\
                                    <div class="lower">\
                                        <h3>標題</h3>\
                                        <span>簡介</span>\
                                    </div>\
                                </a>\
                            </div>';
        loop.className = 'col-md';
    }
}

$(document).ready(function() {
    try {
        objectA();
    } catch {}
});