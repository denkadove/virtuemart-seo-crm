<?php
    if (isset($_GET['auth']) && $_GET['auth'] == 'logout') {
        unset($_SESSION['is_auth']);
        header('Location: /');
        die;
    }

    require_once('templates/default/blocks/header.php');
    require_once('templates/default/blocks/main_content.php');
    require_once('templates/default/blocks/footer.php');
