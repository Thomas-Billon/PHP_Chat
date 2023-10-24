<?php

class Chat
{
    // region VARIABLES

    public int $id = 0;
    public string $username = "";
    public string $message = "";
    public string $date = "";

    // endregion VARIABLES

    // region CONSTRUCTOR

    function __construct(string $username, string $message, string $date = "")
    {
        $this->username = $username;
        $this->message = $message;
        if ($date == "")
        {
            $dt = new DateTime();
            $this->date = $dt->format("Y-m-d H:i:s");
        }
        else
        {
            $this->date = $date;
        }
    }

    // endregion CONSTRUCTOR

    // region METHODS

    static public function get_chat_log() : array
    {
        $chat_log = json_decode(file_get_contents("chat_log.json"), JSON_PRETTY_PRINT);
        $chat_log_obj = array();

        foreach ($chat_log as $chat)
        {
            $chat_obj = new Chat($chat["username"], $chat["message"], $chat["date"]);
            $chat_obj->id = $chat["id"];

            array_push($chat_log_obj, $chat_obj);
        }

        return $chat_log_obj;
    }

    static public function get_chat_log_after_id(int $id) : array
    {
        $chat_log = Chat::get_chat_log();

        foreach ($chat_log as $chat)
        {
            if ($chat->id <= $id)
            {
                array_shift($chat_log);
            }
        }

        return $chat_log;
    }

    static public function set_chat_log($chat_log) : void
    {
        file_put_contents("chat_log.json", json_encode($chat_log, JSON_PRETTY_PRINT));
    }

    public function add_chat() : void
    {
        $chat_log = Chat::get_chat_log();

        $this->id = $chat_log[count($chat_log) - 1]->id + 1;

        if (count($chat_log) >= 10)
        {
            array_shift($chat_log);
        }

        array_push($chat_log, $this);

        Chat::set_chat_log($chat_log);
    }

    public function sanitize_chat() : void
    {
        $this->username = htmlspecialchars($this->username);
        $this->message = htmlspecialchars($this->message);
    }

    // endregion METHODS
}