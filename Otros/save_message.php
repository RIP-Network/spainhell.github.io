<?php
$message = $_POST["message"];
if ($message) {
    $file = fopen("chat_messages.txt", "a");
    fwrite($file, $message . PHP_EOL);
    fclose($file);
}
?>
