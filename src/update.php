<?php

    require_once 'DB/conexao.class.php';

class Update extends Conexao {
    
    /**
     * função que atualiza os dados do aluno no banco de dados.
     * @param nome - nome do aluno
     * @param email - email do aluno
     * @param senha_antiga - antiga senha para comparação
     * @param senha - nova senha para atualizar
     * @param id_aluno - id do aluno que será atualizado
     * @return bool
     */
    public function atualizarAluno($nome, $email, $senha_antiga, $senha, $id_aluno) {
        
        //testar se nenhum dos valores é vazio
        if(!(is_null($nome) || (is_null($email) || 
            is_null($senha) || is_null($id_aluno)|| is_null($senha_antiga)))
        ) {
            
            //testar se o id é realmente um int
            if(filter_var($id_aluno, FILTER_VALIDATE_INT) && 
                filter_var($email, FILTER_VALIDATE_EMAIL)) {

                //verificar se as senhas são iguais antes de alterar
                $pdo = parent::connection();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT senha FROM aluno where id = ?';
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $id_aluno, PDO::PARAM_INT);
                $stm->execute();
                $retorno = $stm->fetch(PDO::FETCH_OBJ);

                
                if($retorno->senha == sha1(sha1($senha_antiga))) {
                    
                    $senhaEncrypt = sha1(sha1($senha));

                    $sql = 'UPDATE aluno SET nome = ?, email = ?, senha = ? 
                            WHERE id = ?'; 
                    $stm = $pdo->prepare($sql);
                    $stm->bindValue(1, $nome, PDO::PARAM_STR);
                    $stm->bindValue(2, $email, PDO::PARAM_STR);
                    $stm->bindValue(3, $senhaEncrypt, PDO::PARAM_STR);
                    $stm->bindValue(4, $id_aluno, PDO::PARAM_INT);
                    
                    if($stm->execute()) {
                        parent::closeConnection();
                        return true;
                    } else {
                        parent::closeConnection();
                        echo "<script type='text/javascript'> 
                                alert('Erro ao atualizar dados');
                            </script>";
                        return false;
                    } 
                    
                } else {
                    $pdo = parent::closeConnection();
                    echo "<script type='text/javascript'> 
                            alert('A senha antiga está errada,' + 
                                ' por favor digite novamente');
                        </script>";
                    return false;
                }
            } else {
                echo "<script type='text/javascript'> 
                        alert('Por favor digite um email valido');
                    </script>";
                return false;
            }

        } else
            return false;
    }

    /**
     * função que atualiza os dados do professor no banco de dados.
     * @param nome - nome do professor
     * @param email - email do professor
     * @param senha_antiga - antiga senha para comparação
     * @param senha - nova senha para atualizar
     * @param id_prof - id do professor que será atualizado
     * @return bool
     */
    public function atualizarProfessor($nome, $email, $senha_antiga, $senha, $id_prof) {
        
        //testar se nenhum dos valores é vazio
        if(!(is_null($nome) || (is_null($email) || 
            is_null($senha) || is_null($id_prof)|| is_null($senha_antiga)))
        ) {
            
            //testar se o id é realmente um int
            if(filter_var($id_prof, FILTER_VALIDATE_INT) && 
                filter_var($email, FILTER_VALIDATE_EMAIL)) {

                //verificar se as senhas são iguais antes de alterar
                $pdo = parent::connection();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT senha FROM professor where id = ?';
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $id_prof, PDO::PARAM_INT);
                $stm->execute();
                $retorno = $stm->fetch(PDO::FETCH_OBJ);

                
                if($retorno->senha == sha1(sha1($senha_antiga))) {
                    
                    $senhaEncrypt = sha1(sha1($senha));

                    $sql = 'UPDATE professor SET nome = ?, email = ?, senha = ? 
                            WHERE id = ?'; 
                    $stm = $pdo->prepare($sql);
                    $stm->bindValue(1, $nome, PDO::PARAM_STR);
                    $stm->bindValue(2, $email, PDO::PARAM_STR);
                    $stm->bindValue(3, $senhaEncrypt, PDO::PARAM_STR);
                    $stm->bindValue(4, $id_prof, PDO::PARAM_INT);
                    
                    if($stm->execute()) {
                        parent::closeConnection();
                        return true;
                    } else {
                        parent::closeConnection();
                        echo "<script type='text/javascript'> 
                                alert('Erro ao atualizar dados');
                            </script>";
                        return false;
                    } 
                    
                } else {
                    $pdo = parent::closeConnection();
                    echo "<script type='text/javascript'> 
                            alert('A senha antiga está errada,' + 
                                ' por favor digite novamente');
                        </script>";
                    return false;
                }
            } else {
                echo "<script type='text/javascript'> 
                        alert('Por favor digite um email valido');
                    </script>";
                return false;
            }

        } else
            return false;
    }

    /** 
     * função que aumenta a pontuação no banco de dados, retorno booleano
     * @param id_aluno id do aluno
     * @return bool
    */
    public function aumentarPontuaçao($id_aluno){
        
        if(filter_var($id_aluno, FILTER_VALIDATE_INT)){
            $pdo = parent::connection();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT pontuacao FROM aluno where id = ?';
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $id_aluno, PDO::PARAM_INT);
                $stm->execute();
                $retorno = $stm->fetch(PDO::FETCH_OBJ);

                $pontuacao = $retorno->pontuacao + 1;

                $sql = 'UPDATE aluno SET pontuacao = ? WHERE id = ?';
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $pontuacao, PDO::PARAM_INT);
                $stm->bindValue(2, $id_aluno, PDO::PARAM_INT);
                $stm->execute();

                parent::closeConnection();

                return true;

        } else {
            return false;
        }
    }
}