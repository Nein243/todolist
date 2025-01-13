$(document).ready( () => {
    $('.delete-category').on('submit', function (event){
        event.preventDefault();
        let data = $(this).serialize();
        let category = $(this.parentNode.parentNode);
        $.ajax({
            method: 'POST',
            url: $(this).attr('action'),
            data: data
        })
            .done(function (msg) {
                category.hide();
                $('#category_deleted').removeClass('hide');
            })
            .fail(function ( msg ){
                console.log( msg )
            });
    })
})