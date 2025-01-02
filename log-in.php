<?php require_once 'header.php'; ?>
<main>
    <div class="registration">
        <h1 class="registration-header">To do List</h1>
        <h2 class="registration-header">Log in to your account!</h2>
        <form action="handler/log-in_handler.php" class="registration-form log-in-form" method="post">
            <div class="registration-form_row">
                <label for="login" class="registration-form_label">Login</label>
                <input type="text" name="login" id="login" class="registration-form_input">
            </div>
            <div class="registration-form_row">
                <label for="password" class="registration-form_label">Password</label>
                <input type="password" name="password" id="password" class="registration-form_input">
            </div>
            <div class="registration-form_row">
                <input type="submit" name="submit" id="submit" class="yellow-button registration_submit">
            </div>
        </form>
        <div class="registration-link">Haven't had an account yet? <a href="registration.php">Sign up!</a></div>
    </div>
    <?php require_once 'footer.php'; ?>
