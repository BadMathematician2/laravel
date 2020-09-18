const imgs = Array.from(document.getElementsByTagName('img'));


function click(event) {

    if (event.button == 2) {
        event.preventDefault();
        return false;
    }
    if (event.which == 3) {
        event.preventDefault();
        return false;
    }
}

imgs.forEach(el => {
    el.addEventListener('contextmenu',click);
});
