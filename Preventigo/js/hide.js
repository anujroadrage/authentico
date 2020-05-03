var i = 1;
function hideMenu() {
    var menu = document.getElementById("nav-menu");
    var ham =  document.getElementsByClassName("burger")[0];
    var close =  document.getElementsByClassName("close")[0];
    i++;
    if ($(window).width() < 767) {
        ham.style.display = "inline";
        close.style.display = "none";
        menu.style.display = "none";
    }
}