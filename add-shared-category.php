<div class="shared-category_item shared-category_add" id="addSharedCategoryCell">
    <p class="shared-category_add-text">Add Category</p>
<?php
//TODO КРЕСТИК ЗАКРЫТИЯ
?>
    <div class="add-shared-category_form hide">
        <form action="handler/add-shared-category_handler.php"
              id="addSharedCategory"
              method="post">
            <input type="hidden" name="teamId" value="<?= $_GET['id']?>">
            <div class="add-shared-category_row">
                <label for="title" class="add-shared-category_label">Enter category name</label>
                <input type="text"
                       name="title"
                       class="add-shared-category_title"
                       required>
            </div>

            <div class="add-shared-category_row">
                <label for="color" class="add-shared-category_label">Choose category color</label>
                <input type="color"
                       name="color"
                       value="#FFEB7A"
                       class="add-shared-category_color">

                <div class="task-setting_object ">
                    <button type="submit"
                            title="Submit"
                            name="submit"
                            class="task-button add-shared-category_button">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             x="0px"
                             y="0px"
                             width="24"
                             height="24"
                             viewBox="0 0 16 16">
                            <path d="M 7.5 1 C 3.917969 1 1 3.917969 1 7.5 C 1 11.082031 3.917969 14 7.5 14 C 11.082031 14 14 11.082031 14 7.5 C 14 3.917969 11.082031 1 7.5 1 Z M 7.5 2 C 10.542969 2 13 4.457031 13 7.5 C 13 10.542969 10.542969 13 7.5 13 C 4.457031 13 2 10.542969 2 7.5 C 2 4.457031 4.457031 2 7.5 2 Z M 10.144531 5.148438 L 6.5 8.792969 L 4.851563 7.148438 L 4.148438 7.851563 L 6.5 10.207031 L 10.855469 5.851563 Z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>