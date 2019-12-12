<?php

require_once 'DB/conexao.class.php';

class Read extends Conexao {

    public function mostrarUsuario($id, $cargo) {
        
        if (!(is_null($id) || is_null($cargo))) {

            $pdo = parent::connection();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM $cargo where id = ?";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $retorno = $stm->fetch(PDO::FETCH_OBJ);
            parent::closeConnection();

            return $retorno;

        } else 
            return false;
    }

    public function mostrarQuestao($id_professor) {
        
        if (!is_null($id_professor)) {

            $pdo = parent::connection();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM questao where professor_id = ?";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(1, $id_professor, PDO::PARAM_INT);
            $stm->execute();
            $retorno = $stm->fetchAll();
            parent::closeConnection();

            return $retorno;

        } else 
            return false;
    }
}