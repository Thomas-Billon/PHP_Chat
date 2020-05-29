<?php

@ini_set('display_errors', 'on');
require_once("../../../config.php");

$mysqli = mysqli_connect($mysqli_host, $mysqli_id, $mysqli_pass, $mysqli_db);

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: ". mysqli_connect_error();
    return FALSE;
}
if(isset($_POST['submit']))
{
    if(!empty($_POST['pseudo']) AND !empty($_POST['message']))
    {
        $pseudo = htmlspecialchars(strip_tags(mysqli_real_escape_string($mysqli, $_POST['pseudo'])), ENT_QUOTES);
        $message = htmlspecialchars(strip_tags(mysqli_real_escape_string($mysqli, $_POST['message'])), ENT_QUOTES);
        $sql = "INSERT INTO chat_ajax VALUES('', '". $pseudo ."', '". $message ."')";

        if (!mysqli_query($mysqli, $sql))
        {
        	echo "An error occured :(<br />". mysqli_error($mysqli);
        	return FALSE;
        }
    }
    else
    {
        echo "Vous avez oublié de remplir un des champs !";
        return FALSE;
    }
}
else
{
    echo "Vous devez d'abord remplir le formulaire !";
    return FALSE;
}
mysqli_close($mysqli);
echo "OK!";
return TRUE;

?>