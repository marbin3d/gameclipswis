//SOFIA CODE
document.getElementById("myBtn").addEventListener("click", toggleNav);

function toggleNav() {
    navSize = document.getElementById("mySidenav").style.width;
    if (navSize == "250px") {
        return closeNav();
    }
    return openNav();
}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("slidemenu").style.opacity = "100";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0px";
    document.getElementById("slidemenu").style.opacity = "0";
}


$("#menuYoutube").hide();
$(".searchGameClips").click(function () {
    $("#menuGameClips").show();
    $("#menuYoutube").hide();

});
$(".searchYoutube").click(function () {
    $("#menuYoutube").show();
    $("#menuGameClips").hide();

});

$(function () {
    // Since there's no list-group/tab integration in Bootstrap
    $('.list-group-item').on('click', function (e) {
        var previous = $(this).closest(".list-group").children(".active");
        previous.removeClass('active'); // previous list-item
        $(e.target).addClass('active'); // activated list-item
    });
});
//END SOFIA CODE