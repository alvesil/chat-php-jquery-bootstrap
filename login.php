<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url("bg.webp");
        }
        h1{
            margin-top: 200px;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="container-fluid">
    <center>
        <h1>Fazer Login</h1>
        <form>
            <div class="col-xl-3 col-lg-6 col-md-9 col-sm-12 mb-2 ml-2 mr-2">
                <input class="form-control" type="text" name="username" placeholder="Usuário">
                <input class="form-control" type="password" name="password" placeholder="Senha">
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </center>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(function(e) {
                e.preventDefault();
                var username = $('input[name="username"]').val();
                var password = $('input[name="password"]').val();
                $.ajax({
                    url: 'auth.php',
                    type: 'POST',
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(data) {
                        var res = JSON.parse(data);
                        console.log(res);
                        if (res.message == "true") {
                            window.location.href = 'index.php';
                        } else {
                            alert(data.message);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>