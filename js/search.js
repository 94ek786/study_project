function search_condition(NULL) {
    var U = decodeURI(window.location.href);
    var sccity = U.split('city=')[1].split('&');
    document.getElementById('search_condition').innerHTML = '搜索條件：' + sccity;
}

$(document).ready(function() {
    search_condition();
});