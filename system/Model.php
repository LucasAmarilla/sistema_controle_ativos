<?php
  class Model {
    protected $conexao;
    protected $table;
    protected $orderBy;
    protected $sql = "";

    function __construct() {
        try {
            $this->conexao = new PDO('pgsql:host=localhost;dbname=web3', 'postgres', 'root');
        } catch (PDOException $e) {
            $this->conexao = null;
        }        
    }    
    
    function all() {
        if ($this->sql != "") {
            $sql = $this->sql;
        } else {
            $sql = "SELECT * FROM $this->table ORDER BY $this->orderBy";
        }
        $sentenca = $this->conexao->query($sql);
        $sentenca->setFetchMode(PDO::FETCH_ASSOC);
        $dados = $sentenca->fetchAll();
        return $dados;
    }    

    function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id=:id";
        $sentenca = $this->conexao->prepare($sql);
        $sentenca->bindParam(":id", $id);
        
        $sentenca->execute();      
      }  

    function getById($id) {
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        $sentenca = $this->conexao->prepare($sql);
        $sentenca->bindParam(":id", $id);
        
        $sentenca->execute();      
        $sentenca->setFetchMode(PDO::FETCH_ASSOC);
        $dados = $sentenca->fetch();
        return $dados;      
      }        
      
    function create($dados) {
        if (isset($dados['id'])) {
            unset($dados['id']);
        }
        $keys = array_keys($dados);
        $fields = implode(', ' , $keys);
        $values = ':' . implode(', :', $keys);
        
        $sql = "INSERT INTO $this->table ($fields)
            VALUES ($values)";

        echo $sql;

        $sentenca = $this->conexao->prepare($sql);
        foreach ($keys as $key) {
            $sentenca->bindParam(':'.$key, $dados[$key]);
        }
        $sentenca->execute();
  
    }      
    function update($dados) {
        $keys = array_keys($dados);
        $set = "";
        foreach ($keys as $key) {
          if ($key != "id") { 
            if ($set != "") {
                $set .= ", ";
            }
            $set .= $key."=:".$key;
          }  
        }
        $sql = "UPDATE $this->table SET $set WHERE id=:id";
        $sentenca = $this->conexao->prepare($sql);
        foreach ($keys as $key) {
            $sentenca->bindParam(':'.$key, $dados[$key]);
        }
 
        $sentenca->execute();
  
      } 
  }
?>