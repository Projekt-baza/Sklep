<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Rejestracja</title>
        <link rel="icon" href="img/flexstore.png" type="image/icon type">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container more-margin-bottom">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="shadow-lg border-login mt-5">
                                    <div class="card-login-header"><h3 class="text-center header-login-text my-4">Utwórz konto</h3></div>
                                    <div class="card-body bg-login">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="header-login-little-text mb-1" for="inputFirstName">Imię</label>
                                                        <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Jan" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="header-login-little-text mb-1" for="inputLastName">Nazwisko</label>
                                                        <input class="form-control py-4" id="inputLastName" type="text" placeholder="Kowalski" />
                                                    </div>
                                                </div>
                                            <div class="col-md-12">
                                                <label class="header-login-little-text mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="example@gmail.pl" />
                                            </div>
                                          </div>
                                            <div class="form-row">
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label class="header-login-little-text mb-1" for="inputPassword">Hasło</label>
                                                        <input class="form-control py-4" id="inputPassword" type="password" placeholder="********" />
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label class="header-login-little-text mb-1" for="inputConfirmPassword">Potwierdź hasło</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="********" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="logowanie.php">Utwórz konto</a></div>
                                        </form>
                                    </div>
                                    <div class="card-login-footer text-center">
                                        <div class="footer-login-text"><a href="logowanie.php">Posiadasz konto? Zaloguj się</a></div>
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
                            <div class="text-muted">Copyright &copy; Jastrzębska Hepner Gastołek 2020</div>
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
