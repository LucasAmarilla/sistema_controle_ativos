      <h1>Formulário de Notícia</h1>
      <form action="<?php echo APP . 'equipamento/salvar'; ?>" method="POST">
        <div class="form-group">
          <label for="id">ID</label>
          <input readonly type="text" class="form-control" id="id" name="id" value="<?php echo $dados['id']; ?>">
        </div>
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $dados['nome']; ?>">
        </div>
        <div class="form-group">
          <label for="data">Data de instalação</label>
          <input type="date" class="form-control" id="data_instalado" name="data_instalado" value="<?php echo $dados['data_instalado']; ?>">
        </div>
        <div class="form-group">
          <label for="frequencia">Opera em qual frequencia (Hz)</label>
          <input type="text" class="form-control" id="hertz_opera" name="hertz_opera" value="<?php echo $dados['hertz_opera']; ?>">
        </div>
        <div class="form-group">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $dados['endereco']; ?>">
        </div>
        <div class="form-group">
          <label for="Ativo">Ativo</label>
          <select class="form-select" name="ativo" id="ativo" >
            <option value=1>Sim</option>
            <option value=0>Não</option>
          </select>
        </div>

        <div class="form-group">
          <label for="Tipo">Tipo</label>
          <select class="form-select" id="tipo_id" name="tipo_id">
            <?php
            foreach ($tipos as $tipo) {
              $selected = $tipo['id'] == $dados['tipo_id'] ? 'selected' : '';
              echo "
                <option $selected value='{$tipo['id']}'>{$tipo['nome']}</option>                
                ";
            }
            ?>

          </select>
        </div>
    

        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>