<div class="user-block">
    <div class="user-info">
        <div class="user-profile">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 48 48">
            <path d="M24 4A10 10 0 1024 24 10 10 0 1024 4zM36.021 28H11.979C9.785 28 8 29.785 8 31.979V33.5c0 3.312 1.885 6.176 5.307 8.063C16.154 43.135 19.952 44 24 44c7.706 0 16-3.286 16-10.5v-1.521C40 29.785 38.215 28 36.021 28z"></path>
        </svg>
    </div>
    <div class="user-content">
        <span class="user-registration_link"><?=$_SESSION['login']?></span>
    </div>
    </div>
    <div class="user-hidden">
        <ul class="navigation-section">
            <li class="navigation-id">Your ID: <?=$_SESSION['id']?></li>
            <li class="navigation-row">Settings</li>
            <li class="navigation-row"><a href="handler/log-out.php">Log out</a></li>
        </ul>
    </div>


</div>