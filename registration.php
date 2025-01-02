<?php require_once 'header.php'; ?>
<main>

    <div class="registration">
        <h1 class="registration-header">To do List</h1>
        <h2 class="registration-header">Register now!</h2>
        <form action="handler/registration_handler.php" class="registration-form" method="post">
            <div class="registration-form_row">
                <label for="login" class="registration-form_label">Login</label>
                <input type="text" name="login" id="login" class="registration-form_input">
            </div>
            <div class="registration-form_row">
                <label for="name" class="registration-form_label">Name</label>
                <input type="text" name="name" id="name" class="registration-form_input">
            </div>
            <div class="registration-form_row">
                <label for="password" class="registration-form_label">Password</label>
                <input type="password" name="password" id="password" class="registration-form_input">
            </div>
            <div class="registration-form_row">
                <label for="password_confirm" class="registration-form_label">Confirm password</label>
                <input type="password" name="password_confirm" id="password_confirm"
                       class="registration-form_input">
            </div>
            <div class="registration-form_row">
                <input type="submit" name="submit" id="submit" class="yellow-button registration_submit">
            </div>
        </form>


        <div class="registration-link">Already signed up? <a href="log-in.php">Log in!</a></div>
    </div>
    <?php require_once 'footer.php'; ?>
