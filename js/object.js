function objectA(NULL){
    for (let loop of document.querySelectorAll('.objectA')) {
        loop.innerHTML = '\
                            <div class="outer">\
                                <a href="404ERROR.html">\
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
        loop.className = 'col-md'
    }
}

$(document).ready(function() {
    objectA();
});