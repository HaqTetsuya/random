<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Login User</title>
</head>

<body>
    <br>
    <br>
    <br>
    <br>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="col-md-5">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h1 class="text-center mb-4">Login</h1>
                    <form method="post" action="php/submitlogin.php">
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input name="username" type="text" id="username" class="form-control" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="pass">Password</label>
                            <input name="pass" type="password" id="pass" class="form-control" placeholder="Masukkan Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>                    
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
