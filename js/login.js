function next_input(event) {
    if (event.key === "Enter") {
        var $this = $(event.target);
        var index = parseFloat($this.attr('data-index'));
        $('[data-index="' + (index + 1).toString() + '"]').focus();
    };
};

function loginC() {
    if (window.location.href.split('lpath=')[1].split('&')[0] == 'asdf') {
        location.href = 'member.html?login=True'
    } else {
        location.href = window.location.href.split('lpath=')[1].split('&')[0] + '?login=True';
    }
}