<?php
  class TipoController extends Controller {
    function listar() {
      $model = new Tipo();
      $dados = $model->all();
      $this->view("listagemTipo", compact('dados'));
    }
    

    function novo() {
      $dados = array();
      $dados['id'] = 0;
      $dados['nome'] = "";
      $dados['tipo'] = "";

      $this->view('frmTipo', compact('dados'));
    }

    function salvar() {
      $dados = array();
      $dados['id'] = $_POST['id'];
      $dados['nome'] = $_POST['nome'];
      $dados['tipo'] = $_POST['tipo'];

      $model = new Tipo();
      if ($dados['id'] == 0) {
        $model->create($dados);
      } else {
        $model->update($dados);
      }
      $this->redirect('tipo/listar');
    }
    
    function excluir($id) {
      $model = new Tipo();
      $model->delete($id);
      $this->redirect('tipo/listar');
    }    
    function editar($id) {
      $model = new Tipo();
      $dados = $model->getById($id);
      $this->view('frmTipo', compact('dados'));      
    }    

  }
?>