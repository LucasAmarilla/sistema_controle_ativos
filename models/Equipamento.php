<?php
  class Equipamento extends Model {
    protected $table = "equipamento";
    protected $orderBy = "data_instalado DESC, id";
    protected $sql = "SELECT equipamento.*, tipo.nome AS tipo_nome 
         FROM equipamento LEFT JOIN tipo 
         ON tipo.id = equipamento.tipo_id 
         ORDER BY data_instalado DESC, id";  
  }
?>