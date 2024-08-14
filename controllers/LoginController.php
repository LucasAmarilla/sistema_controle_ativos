<?php
  class LoginController extends Controller {
    function login() {
        $mensagem = '';
        if (isset($_COOKIE['mensagem'])) {
          $mensagem = $_COOKIE['mensagem'];
          setcookie(
            "mensagem", null,
            0, "/web3", "localhost", false, false);
        }

        $this->view('frmLogin', compact('mensagem'));
    }
    function logar() {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $model = new Usuario();
        $dados = $model->getByEmail($email);
        if (!$dados) {
            setcookie(
                "mensagem", "E-mail '$email' não encontrado !!!",
                0, "/web3", "localhost", false, false);
            $this->redirect("login/login");
        } else {
          if ($dados['senha'] != $senha) {
            setcookie(
                "mensagem", "Senha inválida !!!",
                0, "/web3", "localhost", false, false);
            $this->redirect("login/login");
          }    else {
            session_start();
            $_SESSION['usuario_id'] = $dados['id'];
            $this->redirect("");
          }
        }
    }

    function logout() {
        session_start();
        session_destroy();
        $this->redirect("login/login");
    }
  }
?>