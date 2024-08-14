<?php
  class EquipamentoController extends Controller {
    function listar() {
        $mensagem = '';
        if (isset($_COOKIE['mensagem'])) {
          $mensagem = $_COOKIE['mensagem'];
          setcookie(
            "mensagem", "",
            0, "/web3", "localhost", false, false);
        }
        $model = new Equipamento();
        $dados = $model->all();
        $this->view('listagemEquipamentos', compact('dados', 'mensagem'));
    }


    function novo() {
      $dados = array();
      $dados['id'] = 0;
      $dados['nome'] = "";
      $dados['hertz_opera'] = "";
      $dados['autor'] = "";
      $dados['categoria_id'] = "";
      $dados['endereco'] = "";
      $dados['data_instalado'] = ""; 

      $modelTipo = new Tipo();
      $tipos = $modelTipo->all();
      $this->view('frmEquipamento', compact('dados', 'tipos'));
    }
    function salvar() {
      $dados = array();
      $dados['id'] = $_POST['id'];
      $dados['nome'] = $_POST['nome'];
      $dados['hertz_opera'] = $_POST['hertz_opera'];
      $dados['ativo'] = $_POST['ativo'];
      $dados['tipo_id'] = $_POST['tipo_id'];
      $dados['endereco'] = $_POST['endereco'];
      $dados['data_instalado'] = $_POST['data_instalado'];

      $model = new Equipamento();
      if ($dados['id'] == 0) {
        $model->create($dados);
      } else {
        $model->update($dados);
      }
      setcookie(
        "mensagem", "Equipamento '{$dados['nome']}' foi salva !!!",
        0, "/web3", "localhost", false, false);
      $this->redirect('equipamento/listar');
    }
    function editar($id) {
      $model = new Equipamento();
      $dados = $model->getById($id);
      $modelTipo = new Tipo();
      $tipos = $modelTipo->all();
      $this->view('frmEquipamento', compact('dados', 'tipos'));
    }
    function excluir($id) {
        $model = new Equipamento();
        $dados = $model->getById($id);
        $model->delete($id);
        setcookie(
          "mensagem", "Equipamento '{$dados['nome']}' foi excluída !!!",
          0, "/web3", "localhost", false, false);
  
       $this->redirect('equipamento/listar');
    }
  }
?>