<?php session_start();
if (isset($_SESSION['username'])) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                background-color: #f5f5f5;
            }

            .message {
                display: flex;
                /* justify-content: space-between; */
                align-items: center;
                padding: 10px;
                border-bottom: 1px solid #ccc;
            }

            .message-text {
                font-size: 1.2em;
            }

            .message .username {
                font-weight: bold;
            }

            .message .username:hover {
                text-decoration: underline;
            }

            .message .username:hover a {
                text-decoration: underline;
            }

            .message .username a {
                color: #000;
            }

            .message .username a:hover {
                text-decoration: underline;
            }

            .message .message-text {
                color: #000;
            }

            .message .message-text:hover {
                text-decoration: underline;
            }

            .message .message-text a {
                color: #000;
            }

            .message .message-text a:hover {
                text-decoration: underline;
            }

            .message .message-text a:visited {
                color: #000;
            }

            .message .message-text a:visited:hover {
                text-decoration: underline;
            }

            .message .message-text a:active {
                color: #000;
            }

            .message .message-text a:active:hover {
                text-decoration: underline;
            }

            .message .message-text a:focus {
                color: #000;
            }

            .message .message-text a:focus:hover {
                text-decoration: underline;
            }

            .message .message-text a:hover {
                text-decoration: underline;
            }

            .message .message-text a:visited {
                color: #000;
            }

            .message .message-text a:visited:hover {
                text-decoration: underline;
            }

            body {
                background-image: url("bg2.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
                background-position: center;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <title>Chat</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    </ul>
                    <form class="d-flex" role="search">
                        <a class="btn btn-danger mt-2 mb-2 ms-auto float-right col-12" id="sair" href="logout.php">Sair</a>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <center>
                <h1 class="text-light">Mensagens</h1>
                <div class="col-xl-6 col-lg-6 col-md-9 mb-2 bg-light" style="overflow-y: scroll; height:400px;" id="chat-messages"></div>
                <form id="chat-form">
                    <div class="col-xl-3 col-lg-6 col-md-9 col-sm-12 mb-2 ml-2 mr-2">
                        <input type="text" class="form-control" id="chat-message" placeholder="Escreva algo aqui...">
                    </div>
                    <div class="d-grid gap-2 col-xl-3 col-lg-6 col-md-9 col-sm-12 mx-auto">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>

                </form>
            </center>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            function clearconsole() {
                console.log(window.console);
                if (window.console || window.console.firebug) {
                    console.clear();
                }
            }
            $(document).ready(function() {
                $('#chat-form').submit(function(e) {
                    e.preventDefault();
                    var message = $('#chat-message').val();
                    $.ajax({
                        url: 'send.php',
                        type: 'POST',
                        data: {
                            message: message,
                            username: '<?php echo $_SESSION['username']; ?>'
                        }
                    });
                    $('#chat-message').val('');
                    var myscroll = $("#chat-messages");
                    myscroll.scrollTop(myscroll.get(0).scrollHeight);
                });
                setInterval(function() {
                    $.ajax({
                        url: 'chat.php',
                        type: 'GET',
                        success: function(data) {
                            $('#chat-messages').html(data);
                        }
                    });
                    var myscroll = $("#chat-messages");
                    myscroll.scrollTop(myscroll.get(0).scrollHeight);
                    clearconsole();
                }, 2000);


            });
        </script>
    </body>
    </html>
<?php } else {
    header("Location: login.php");
} ?>