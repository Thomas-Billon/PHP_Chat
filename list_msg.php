<?php

require_once("chat.php");


if(!isset($_GET["id"]))
{
    $result = array("response" => false);
    echo json_encode($result);
    return;
}

$id = intval($_GET["id"]);

$chat_log = Chat::get_chat_log_after_id($id);

foreach ($chat_log as $chat)
{
    $chat->sanitize_chat();
}

$result = array("response" => true, "chatLog" => $chat_log);
echo json_encode($result);
return;