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