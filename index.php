<!DOCTYPE html>
<html lang="en">
<head>
    <title>AJAX Chat</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <link type="text/css" rel="stylesheet" href="assets/css/style.css" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container">
        <div id="chat-window" class="w-100 d-flex flex-column-reverse mt-4 mb-2 p-2 bg-white overflow-auto border rounded">
            <div class="chat-list d-flex flex-column">

            </div>
        </div>
        <form id="chat-form" class="mb-4" method="POST" action="send_msg.php">
            <div class="row">
                <div class="col-9">
                    <div class="mb-2">
                        <input name="username" type="text" class="form-control bg-white" aria-label="Username" placeholder="Username">
                    </div>
                    <div>
                        <textarea name="message" class="form-control bg-white" aria-label="Message" placeholder="Message"></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="w-100 h-100 bg-white rounded">
                        <button type="submit" class="w-100 h-100 btn btn-outline-primary">Send</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script type="module" src="assets/js/main.js"></script>
</html>