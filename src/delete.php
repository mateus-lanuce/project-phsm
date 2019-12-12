<?php

require_once 'DB/conexao.class.php';

//classe que deletar os itens do banco de dados.
class Delete extends Conexao {

    /**
     * classe que apaga os dados do aluno do banco.
     * @param id_aluno - id do aluno.
     * @return false - se der erro, se não redireciona para a pagina inicial.
     */
    public function apagarAluno($id_aluno) {
        
        if (!is_null($id_aluno)) {
            
            if (filter_var($id_aluno, FILTER_VALIDATE_INT)) {
                
                $pdo = parent::connection();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'DELETE FROM aluno where id = ?';
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $id_aluno);

                if($stm->execute()) {
                    header('Location:../index.php');
                } else {
                    echo "<script type=text/javascript> 
                        alert('Erro ao deletar dados!');
                        </script>";
                    return false;
                }

            } else 
                return false;

        } else 
            return false;
        
    }

    /**
     * classe que apaga os dados do professor do banco.
     * @param id_professor - id do professor.
     * @return false - se der erro, se não redireciona para a pagina inicial.
     */
    public function apagarProfessor($id_professor) {
        
        if (!is_null($id_professor)) {
            
            if (filter_var($id_professor, FILTER_VALIDATE_INT)) {
                
                $pdo = parent::connection();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'DELETE FROM professor where id = ?';
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $id_professor);

                if($stm->execute()) {
                    time_nanosleep(1, 500);
                    header('Location:../index.php');
                } else {
                    echo "<script type=text/javascript> 
                        alert('Erro ao deletar dados!');
                        </script>";
                    return false;
                }

            } else 
                return false;

        } else 
            return false;
        
    }

    /**
     * classe que apaga os dados dar questão do banco.
     * @param id_questao - id da questao.
     * @return bool
     */
    public function apagarQuestao($id_questao) {
        
        if (!is_null($id_questao)) {
            
            if (filter_var($id_questao, FILTER_VALIDATE_INT)) {
                
                $pdo = parent::connection();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'DELETE FROM questao where id = ?';
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $id_questao);

                if($stm->execute()) {
                    echo "<script type=text/javascript> 
                        alert('Questão apagada com sucesso');
                        </script>";
                    return true;
                } else {
                    echo "<script type=text/javascript> 
                        alert('Erro ao deletar dados!');
                        </script>";
                    return false;
                }

            } else 
                return false;

        } else 
            return false;
        
    }
}
