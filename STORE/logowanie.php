<!DOCTYPE html
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Logowanie</title>
        <link rel="icon" href="img/flexstore.png" type="image/icon type">
        <link rel = "icon" href="https://media.geeksforgeeks.org/wp-content/cdn-uploads/gfg_200X200.png" type = "image/x-icon">

        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                  <div class="backtomain"><a class="btn btn-primary" href="index.php"><div class="sb-nav-link-icon"><i class="fas fa-long-arrow-alt-left"></i> Powrót na główną </div></a></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="shadow-lg border-login mt-5">
                                    <div class="card-login-header"><h3 class="text-center header-login-text">Zaloguj się</h3></div>
                                    <div class="card-body bg-login">
                                        <form>
                                            <div class="form-group">
                                                <label class="mb-1 header-login-little-text" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="example@gmail.com" />
                                            </div>
                                            <div class="form-group">
                                                <label class="header-login-little-text mb-1" for="inputPassword">Hasło</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="***** ***" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Zapamiętaj hasło</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="btn btn-primary" href="index-Admin.php">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-login-footer text-center">
                                        <div class="footer-login-text"><a href="rejestracja.php">Nie posiadasz jeszcze konta? Zarejestruj się!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-dark mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
