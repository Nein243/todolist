<div class="chat_button">
    <a href="team-chat_view.php" class="chat-icon">
        <svg width="50px" height="50px" viewBox="-2.4 -2.4 28.80 28.80" xmlns="http://www.w3.org/2000/svg"
             fill="#000000"
             stroke="#000000" transform="rotate(0)">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC"
               stroke-width="0.144"></g>
            <g id="SVGRepo_iconCarrier"><title></title>
                <g id="Complete">
                    <g id="bubble-square">
                        <path d="M7.7,18.3H19.4a2.1,2.1,0,0,0,2.1-2.1V4.6a2.1,2.1,0,0,0-2.1-2.1H4.6A2.1,2.1,0,0,0,2.5,4.6V21.5Z"
                              fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="1.656"></path>
                    </g>
                </g>
            </g>
        </svg>
    </a>
    <div class="chat_notifications">
        <?php echo getUnreadMessagesNumber(); ?>
    </div>
</div>
