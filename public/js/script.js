let id = 10;

let checkbox_radio =
    "<div class='form-group checkbox_radio'>" +
    "<label>Options</label>" +
    "<input type='text' name='answers[][answer]' class='form-control'>" +
    '<span style="float:right; cursor:pointer;"class="delete-option">Delete</span>' +
    '<span class="add-option" style="cursor:pointer;">Add Another</span>' +
    "</div>";

$(document).on("click", ".add-option", function() {
    $(".type_checkbox_or_radio").append(checkbox_radio);
});

$(document).on("click", ".delete-option", function() {
    $(this)
        .parent(".checkbox_radio")
        .remove();
    if ($(".checkbox_radio").length == 0) {
        $("#checkRadio").hide();
        $("#choose").attr("selected", "true");
        $("button").attr("disabled", "true");
    }
});

$(document).on("change", "#question_type", function() {
    let select_option = $("#question_type").val();
    showInput(select_option);
});

function showInput(option) {
    if (option === "radio" || option === "checkbox") {
        $(".type_checkbox_or_radio").html(checkbox_radio);
        $("#checkRadio").show();
        $("#inputText").hide();
        $("div").removeAttr("hidden");
        $("button").removeAttr("disabled");
    } else if (option === "text" || option === "textarea") {
        $("#inputText").show();
        $("#checkRadio").hide();
        $("div").removeAttr("hidden");
        $(".checkbox_radio").remove();
        $("button").removeAttr("disabled");
    } else if (option === "choose") {
        $("#inputText").hide();
        $("#checkRadio").hide();
        $(".checkbox_radio").remove();
        $("button").attr("disabled", "true");
    }
}
