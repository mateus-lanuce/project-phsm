<?php

require 'DB/conexao.class.php';

class Read extends Conexao {

    public function mostrarUsuario($id, $cargo) {
        
        if (!(is_null($id) || is_null($tab))) {

            $pdo = parent::connection();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM $tab where id = ?";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $retorno = $stm->fetch(PDO::FETCH_OBJ);
            parent::closeConnection();

            return $retorno;

        } else 
            return false;
    }

    public function mostrarQuestao($id) {
        
        if (!is_null($id)) {

            $pdo = parent::connection();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM questao where id = ?";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(1, $id, PDO::PARAM_INT);
            $stm->execute();
            $retorno = $stm->fetch(PDO::FETCH_OBJ);
            parent::closeConnection();

            return $retorno;

        } else 
            return false;
    }
}