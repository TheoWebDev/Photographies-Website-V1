// Fonction navbar principale
$('.navTrigger').click(function () {
    $(this).toggleClass('active');
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();
});

// Fonction navbar secondaire
$('.navTriggerTwo').click(function () {
    $(this).toggleClass('active');
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();
});

// AOS Animation Scroll
AOS.init({
    duration: 1200,
})