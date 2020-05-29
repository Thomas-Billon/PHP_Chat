<?php

@ini_set('display_errors', 'on');
require_once("../../../config.php");

$mysqli = mysqli_connect($mysqli_host, $mysqli_id, $mysqli_pass, $mysqli_db);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: ". mysqli_connect_error();
    return FALSE;
}

if(isset($_GET['id']))
{
    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM (SELECT * FROM chat_ajax WHERE id > ". $id ." ORDER BY id) AS t ORDER BY id ASC";

    if (!$request = mysqli_query($mysqli, $sql))
    {
        echo "An error occured :(<br />". mysqli_error($mysqli);
        return FALSE;
    }

    while($data = $request->fetch_assoc())
    {
        echo "<p id=\"". $data['id'] ."\">". $data['login'] ." : ". $data['message'] ."</p>";
    }
    $request->free();
}
else
{
    echo "ID not found";
    return FALSE;
}

mysqli_close($mysqli);
return TRUE;

?>
