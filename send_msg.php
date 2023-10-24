<?php

require_once("chat.php");


if(empty($_POST["username"]) || empty($_POST['message']))
{
    $result = array("response" => false);
    echo json_encode($result);
    return;
}

$username = filter_var($_POST["username"]);
$message = filter_var($_POST["message"]);

$chat = new Chat($username, $message);
$chat->add_chat();

$chat->sanitize_chat();

$result = array("response" => true, "chat" => $chat);
echo json_encode($result);
return;