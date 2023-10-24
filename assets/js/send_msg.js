import {showPopper, hidePopper} from "/assets/js/popper.js";
import {lastId, updateLastId} from "/assets/js/list_msg.js";

const sendMsg = () => {
    let inputUsername = $('#chat-form input[name="username"]');
    let username = inputUsername.val();
    if (username === "")
    {
        showPopper(inputUsername, "Empty username: Please fill this in");
        return;
    }

    let inputMessage = $('#chat-form textarea[name="message"]');
    let message = inputMessage.val();
    if (message === "")
    {
        showPopper(inputMessage, "Empty message: Please fill this in");
        return;
    }

    $.ajax({
        url: "send_msg.php",
        type: "POST",
        dataType: "json",
        data: {
            username: username,
            message: message
        },
        error: (xhr, ajaxOptions, thrownError) => {
            console.log(xhr.responseText);
        },
        success: (result) => {
            console.log(result);

            if (result.response === false) {
                return;
            }

            if (result.chat === null) {
                return;
            }

            let date = new Date(new Date(result.chat.date).getTime() - new Date().getTimezoneOffset() * 60 * 1000);

            $("#chat-window .chat-list").append(`<p class="m-0"><span class="text-primary">(${date.toUTCString()})</span> <span class="text-primary fw-bold">${username}</span> - ${message}</p>`);
            inputMessage.val("");

            updateLastId(result.chat.id);
        }
    });
}

export const chatFormButton = (() => {
    $("#chat-form button").on("click", (e) => {
        e.preventDefault();

        hidePopper();

        sendMsg();
    });
})();

export const chatFormInput = (() => {
    $("#chat-form input, #chat-form textarea").on("click", (e) => {
        hidePopper();
    });
})();