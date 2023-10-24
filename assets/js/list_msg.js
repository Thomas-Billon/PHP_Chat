export let lastId = 0;

export const updateLastId = (id) => {
    if (lastId < id) {
        lastId = id;
    }
}

const listMsg = (delay) => {
    setTimeout(() => {
        $.ajax({
            url: "list_msg.php",
            type: "GET",
            dataType: "json",
            data: {
                id: lastId
            },
            error: (xhr, ajaxOptions, thrownError) => {
                console.log(xhr.responseText);
            },
            success: (result) => {
                console.log(result);

                if (result.response === false) {
                    return;
                }

                if (result.chatLog === null) {
                    return;
                }

                result.chatLog.forEach((chat) => {
                    let date = new Date(new Date(chat.date).getTime() - new Date().getTimezoneOffset() * 60 * 1000);

                    $("#chat-window .chat-list").append(`<p class="m-0"><span class="text-primary">(${date.toUTCString()})</span> <span class="text-primary fw-bold">${chat.username}</span> - ${chat.message}</p>`);

                    updateLastId(chat.id);
                });
            }
        });
        listMsg(3000);
    }, delay);
}

export const chatWindowLog = (() => {
    listMsg(0);
})();