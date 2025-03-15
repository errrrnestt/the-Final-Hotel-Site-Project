$(document).ready(function() {
    $('#goback').click(function() {
        window.history.back();
    });
});

function allRoom() {
    $('.room').css("display", "inline-block");
    $('.room').css("display", "inline-block");
}

function oneRoom() {
    $('.room').css("display", "none");
    $('.Einzelzimmer').css("display", "inline-block");
}

function doubleRoom() {
    $('.room').css("display", "none");
    $('.Doppelzimmer').css("display", "inline-block");
}

function suiteRoom() {
    $('.room').css("display", "none");
    $('.Suite').css("display", "inline-block");
}

$(document).ready(function() {
    $('#goback').click(function() {
        window.history.back();
    });
});
