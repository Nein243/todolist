$(document).ready(function(){
    $(".category-link").click(function(){
        $(".add-category_hidden").slideToggle(500);
    });
});
$(document).ready(function(){
    $("#add-team_link").click(function(){
        $(".add-team_hidden").slideToggle(500);
    });
});

$(document).ready(function(){
    $(".user-registration_link").click(function(){
        $(".user-hidden").slideToggle(500);
    });
});
$(document).ready(function (){
    $(".warning-button").click(function (){
        $(".warning").addClass("hidden");
    });
});
$(document).ready(function (){
    $(".category-warning-button").click(function (){
        $(".warning-window").addClass("hide");
    });
});

$(document).ready(function() {
    $('#addSharedCategoryCell').click(function() {
        $('.add-shared-category_form').removeClass('hide')

        });
    });

