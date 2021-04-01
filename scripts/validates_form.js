$(".form-group input").focusout(function () {
    if ($(this).val() == "") {
        $(this).siblings().removeClass("hidden");
    } else {
        $(this).siblings().addClass("hidden");
    }
});
$(".form-group").keyup(function () {
    let inputs = $(".form-group input");
    if (inputs[0].value != "" && inputs[1].value) {
        $(".register-btn").attr("disabled", false);
        $(".register-btn").addClass("active");
    } else {
        $(".register-btn").attr("disabled", true);
        $(".register-btn").removeClass("active");
    }
});