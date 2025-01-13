$(document).ready( () => {
    $('#edit-category-form').on('submit', function (event){
        event.preventDefault();
        let data = $(this).serialize();
        let color = $(this).closest('form').find('.category-color_edit').val();
        let title = $(this).closest('form').find('.category-title_edit').val();
        let id = $(this).closest('form').find('.category-id_edit').val();
        let category = $(`[data-category-id='${id}']`);

        $.ajax({
            method: 'POST',
            url: $(this).attr('action'),
            data: data
        })
            .done(function (msg){
                category.find('a').text(title);
                category.css('background-color', color);
                $('#category_edited').removeClass('hide');
            })
    })
})