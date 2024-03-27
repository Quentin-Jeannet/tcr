$('.family-button').on("click", function () {
    // gestion du bouton
    //var familyByttonId = $(this).attr('id');
    var familyByttonactive = $(this).attr('data-active');
    (familyByttonactive == "false") ? $(this).attr("data-active", true).addClass("button-active") : ($(this).attr('id') != "all" ? $(this).attr("data-active", false).removeClass("button-active") : "");
    let activeButtons = $('.family-button[data-active=true]');
    console.log(activeButtons.length);

    if ($(this).attr('id') == "all") {

        allColors();
    } else if (activeButtons.length == 0) {

        $('.first-family-button').attr("data-active", true).addClass("button-active");
        allColors();
    } else {
        redrawColors();
    }

});
function redrawColors() {
    $(".family-button").each(function () {
        if ($(this).attr('id') == "all") {
            $(this).attr("data-active", false).removeClass("button-active")
        }
    })
    $(".color-div").each(function () {
        var parents = $(this).attr("data-family").split(",");
        // console.log(parents)
        $(this).css("display", "none");
        for (var i = 0; i < parents.length; i++) {
            if ($("#" + parents[i]).attr("data-active") == "true") {
                $(this).css("display", "block");
                break;
            }
        }
    });
}
function allColors() {
    $(".family-button").each(function () {
        if ($(this).attr('id') != "all") {
            $(this).attr("data-active", false).removeClass("button-active")
        }
        $(".color-div").each(function () {
            $(this).attr('id', 'all').removeClass("button-active");
            $(this).css("display", "block");
        })
    });
}