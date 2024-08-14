 
 
 <h1>Listagem de Notícias</h1> 
    <a href="novo" class="btn btn-primary">Nova Notícia</a>  
    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Data instalado</th>
      <th scope="col">Hz de operação</th>
      <th scope="col">Ativo</th>
      <th scope="col">Endereço</th>
      <th scope="col">Excluir</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($dados as $equipamento) {
            $data = date('d/m/Y', strtotime($equipamento['data_instalado']));
            $ativo = '<input readonly name="ativo" type="checkbox"  disabled />' ;
            if ($equipamento['ativo'] == 1){
              $ativo = '<input readonly name="ativo" type="checkbox" disabled checked />';
            }
            echo "
            <tr>
                <th scope='row'>{$equipamento['id']}</th>
                <td>{$equipamento['nome']}</td>
                <td>$data</td>
                <td>{$equipamento['hertz_opera']}</td>
                <td>{$ativo}</td>
                <td>{$equipamento['endereco']}</td>

                <td>
                <a href='excluir/{$equipamento['id']}' class='btn btn-danger'>Excluir</a>
                                             
                </td>
                <td>
                <a href='editar/{$equipamento['id']}' class='btn btn-primary'>Editar</a>   
                </td>
            </tr>
                        
            ";
            
        }
    ?>


  </tbody>
</table>      