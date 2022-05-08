function search_condition(NULL) {
    var U = decodeURI(window.location.href);
    var sccity = U.split('city=')[1].split('&')[0];
    document.getElementById('search_condition').innerHTML = sccity;
}

function searching(NULL) {

}

function searching_detail(NULL) {

}

$(document).ready(function() {
    search_condition();
});