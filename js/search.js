function search_condition(NULL) {
    var U = decodeURI(window.location.href);
    var sccity = U.split('city=')[1].split('&');
    document.getElementById('search_condition').innerHTML = sccity;
}

function searching(NULL){

}

function searching_detail(NULL){

}

$(document).ready(function() {
    search_condition();
});