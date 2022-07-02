function to_massage() {
    if (login_check()) {
        location.href = 'message.html?messageid=';
    } else {
        location.href = 'login.html?lpath=' + window.location.href;
    }
}

function add_keep() {
    if (login_check()) {
        window.alert('成功加入收藏')
    } else {
        location.href = 'login.html?lpath=' + window.location.href;
    }
}