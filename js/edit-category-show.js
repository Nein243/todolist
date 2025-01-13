$(document).ready(() => {
 $('.edit-category-btn').on('click', function (event){
     event.preventDefault();
     let color = $(this).data('category-color');
     let title = $(this).data('category-title');
     let id = $(this).data('category-id');
     $('.edit-category').show();
     $('.category-color_edit').attr('value', color);
     $('.category-title_edit').attr('value', title);
     $('.category-id_edit').attr('value', id);
 })
});

