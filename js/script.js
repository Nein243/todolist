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

$(document).ready(function () {
    $("#add-team-task").hide();

    $("#show-team-task").click(function () {
        $("#add-team-task").slideToggle(300);
    });
});

$(document).ready(function() {
    var chatWindow = $(".chat_window");
    chatWindow.scrollTop(chatWindow[0].scrollHeight);

    // Автоскролл при добавлении новых сообщений
    var observer = new MutationObserver(function() {
        chatWindow.scrollTop(chatWindow[0].scrollHeight);
    });

    observer.observe(chatWindow[0], { childList: true });
});


