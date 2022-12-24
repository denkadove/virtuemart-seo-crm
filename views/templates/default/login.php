<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex" content="noindex, nofollow" />
    <link rel="shortcut icon" href="views/templates/default/assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="views/templates/default/assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>CRM</title>
</head>
<body class="text-center">
    <?php //TODO move to model

        if(!empty($_POST['login']) && !empty($_POST['password'])){
            if ($_POST['login'] === 'admin' & $_POST['password'] === 'admin'){
                $_SESSION['is_auth'] = true;
                header('Location: /');
                die;
            } else {
                echo 'Неверный логин или пароль';
            }
        }
    ?>

    <main class="form-signin">
        <form action="" method="post">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" name="login" class="form-control" id="floatingInput" placeholder="Введите логин">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Введите пароль">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
            <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
        </form>
    </main>

    <footer>
    </footer>
    <!-- <script src="views/templates/default/assets/js/main.js"></script>     -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>