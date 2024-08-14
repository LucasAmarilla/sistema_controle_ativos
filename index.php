<?php
    include_once "autoload.php";

    define("APP", "http://localhost:4000/web3/");
    //echo "<h1>ola mundo PHP</h1>";
    if (isset($_GET['url'])) {
        $url = $_GET['url'];
    } else {
        $url = 'index/index';
    }
    $url = explode('/', $url);
    //var_dump($url);
    $nomeControlador = ucfirst($url[0]) . "Controller";

    if ($nomeControlador != 'LoginController') {
        session_start();
        if ( ! isset($_SESSION['usuario_id'])) {
            header('location: '.APP.'login/login');
            return;
        }

    }



    $controller = new $nomeControlador();
    $acao = $url[1];
    if (count($url) == 2) {
        $controller->$acao();
    } else {
        $id = $url[2];
        $controller->$acao($id);
    }

?>