<?php
$messages = file("chat_messages.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
echo json_encode($messages);
?>
