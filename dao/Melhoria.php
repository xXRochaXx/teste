<?php 

namespace DAO;

class Melhoria extends Database {

    const TABLE = 'melhorias';
    protected static $oInstance;

    public function filtrarPorUrgencia($urgencia, $fields = null)
    {
        if(is_array($urgencia)) {
            return $this->filtrar('urgencia IN ('. implode(', ', $urgencia) .')', null, $fields);
        }

        $whereValues = [];

        $where                   = 'urgencia = :urgencia';
        $whereValues['urgencia'] = $urgencia;

        return $this->filtrar($where, $whereValues, $fields);
    }

    public function excluirTarefa($id)
    {
        $sql = $this->db->prepare("DELETE FROM melhorias WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function inserirTarefa($areaTarefa, $descricaoTarefa, $prazoAcordado, $prazoLegal, $demandaLegal, $gravidade, $urgencia, $tendencia, $tarefaTitulo)
    {
        $sql = $this->db->prepare("INSERT INTO melhorias 
    (area, descricao, prazo_acordado, prazo_legal, demanda_legal, gravidade, urgencia, tendencia, tarefa) VALUES
    ((SELECT id FROM area WHERE descricao ilike :areaTarefa),
            :descricaoTarefa,:prazoAcordado, :prazoLegal, :demandaLegal, :gravidade, :urgencia, :tendencia, :tarefaTitulo)");
        $sql->bindValue(":areaTarefa", $areaTarefa);
        $sql->bindValue(":descricaoTarefa", $descricaoTarefa);
        $sql->bindValue(":prazoAcordado", $prazoAcordado);
        $sql->bindValue(":prazoLegal", $prazoLegal);
        $sql->bindValue(":demandaLegal", $demandaLegal);
        $sql->bindValue(":gravidade", $gravidade);
        $sql->bindValue(":urgencia", $urgencia);
        $sql->bindValue(":tendencia", $tendencia);
        $sql->bindValue(":tarefaTitulo", $tarefaTitulo);
        $sql->execute();
    }

    public function alteraTarefa($id, $descricaoTarefa, $prazoAcordado, $prazoLegal, $demandaLegal,
                                 $gravidade, $urgencia, $tendencia, $tarefaTitulo)
    {
        $sql = $this->db->prepare("UPDATE melhorias SET descricao = :descricao, prazo_legal = :prazo_legal,
                                       prazo_acordado = :prazo_acordado, demanda_legal = :demanda_legal, gravidade = :gravidade, 
                                        urgencia = :urgencia, tendencia = :tendencia, tarefa = :tarefa WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":descricao", $descricaoTarefa);
        $sql->bindValue(":prazo_acordado", $prazoAcordado);
        $sql->bindValue(":prazo_legal", $prazoLegal);
        $sql->bindValue(":gravidade", $gravidade);
        $sql->bindValue(":demanda_legal", $demandaLegal);
        $sql->bindValue(":urgencia", $urgencia);
        $sql->bindValue(":tendencia", $tendencia);
        $sql->bindValue(":tarefa", $tarefaTitulo);
        $sql->execute();

    }
}
