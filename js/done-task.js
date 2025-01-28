$(document).ready( () => {
    $('.done-task').on('click', function (event){
        event.preventDefault();

        $.ajax({
            method: 'POST',
            url: $(this).attr('action'),
            data: data
        })
            .done(function (msg) {

            }
    })
})