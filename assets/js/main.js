import {popper, showPopper, hidePopper} from "/assets/js/popper.js";

$("#chat-form button").on("click", (e) => {
    e.preventDefault();

    hidePopper();

    let inputUsername = $('#chat-form input[name="username"]');
    let username = inputUsername.val();
    if (username == "")
    {
        showPopper(inputUsername, "This is a test");
        return;
    }

    let inputMessage = $('#chat-form textarea[name="message"]');
    let message = inputMessage.val();
    if (message == "")
    {
        showPopper(inputMessage, "This is a test");
        return;
    }

    $.ajax({
        url: $("#chat-form").attr("action"),
        type: $("#chat-form").attr("method"),
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

            $("#chat-window .chat-list").append(`<p class="m-0"><span class="font-weight-bold text-primary">${username}:</span> ${message}</p>`);
            inputMessage.val("");
        }
    });
});

$("#chat-form input").on("click", (e) => {
    hidePopper();
});

/*
$('#chat').submit(function(e)
{
    e.preventDefault();

    var pseudo = $('#pseudo').val();
    var message = $('#message').val();

    if(pseudo != "" && message != "")
    {
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: "pseudo=" + pseudo + "&message=" + message + "&submit=submit",
            success: function(){
                var lastID = parseInt($('#msg p:last').attr('id')) + 1;
                $('#msg').append("<p id=\""+ lastID +"\">"+ pseudo +" : "+ message +"</p>");
            }
        });
    }
});

function loadList()
{
    setTimeout(function()
    {
        var lastID = $('#msg p:last').attr('id');

        $.ajax({
            url : "update_msg.php?id=" + lastID,
            type : 'GET',
            success : function(html){
                $('#msg').append(html);
            }
        });
        loadList();

    }, 5000);
}

loadList();
*/