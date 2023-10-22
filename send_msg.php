<?php

if(empty($_POST["username"]) || empty($_POST['message']))
{
    $result = array("response" => false);
    echo json_encode($result);
    return;
}

$username = filter_var($_POST["username"]);
$message = filter_var($_POST["message"]);

$result = array("response" => true);
echo json_encode($result);
return;