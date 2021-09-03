<?php 

namespace DAO;

class Area extends Database {

    const TABLE = 'area';
    protected static $oInstance;

    public function alterarArea($id, $descricao)
    {
        $filter = $this->filtrarPorDescricao($descricao);
        if($filter){
            return "existe-area";
        } else {
            $sql = $this->db->prepare('UPDATE area SET descricao = :descricao where id = :id');
            $sql->bindValue(':id', $id);
            $sql->bindValue(':descricao', $descricao);
            $sql->execute();
            return 'success';
        }
    }

    public function inserirArea($descricao)
    {
        $filter = $this->filtrarPorDescricao($descricao);
        if($filter){
            return "existe-area";
        } else {
            $sql = $this->db->prepare("INSERT INTO area (descricao) VALUES (?)");
            $sql->execute((array($_POST['descricao'])));
            return 'success';
        }

    }

    public function excluirArea($id)
    {
        $sqlarea = $this->db->prepare("SELECT * FROM melhorias WHERE area = ?");
        $sqlarea->execute(array($id));

        if ($sqlarea->rowCount() > 0) {
            return 'tarefa-existe';
        } else {
            $sql = $this->db->prepare("DELETE FROM area WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();
            return 'success';
        }


    }

}