<?php

require 'DB/conexao.class.php';

//classe com todos os metodos que fazem cadastro no banco.
class Create extends Conexao{
 
    /** 
     * função que cadastra um aluno no banco de dados, retorno booleano
     * @param nome - nome da pessoa
     * @param email - email da pessoa
     * @param senha - senha do usuario
     * @return bool
    */
    public function cadastrarAluno($nome, $email, $senha): bool {
          
        if(!(is_null($nome) || is_null($email) || is_null($senha))) {
 
            //testar se o email tem o formato valido.
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

                //testar se o email ainda não foi cadastrado.
                $pdo = parent::connection();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT email FROM aluno where email = ?';
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $email, PDO::PARAM_STR);
                $stm->execute();
                $retorno = $stm->fetch(PDO::FETCH_OBJ);

                if(!is_object($retorno)) {
            
                    $senhaEncripty = sha1(sha1($senha));

                    $sql = 'INSERT INTO aluno(nome, email, senha, pontuacao) VALUES (?,?,?,?)';
                    $stm = $pdo->prepare($sql);
                    $stm->bindValue(1, $nome, PDO::PARAM_STR);
                    $stm->bindValue(2, $email, PDO::PARAM_STR);
                    $stm->bindValue(3, $senhaEncripty, PDO::PARAM_STR);
                    $stm->bindValue(4, 0);

                    //testa se o cadastro foi feito com sucesso;
                    if($stm->execute()){
                        parent::closeConnection();
                        return true;
                    } else {
                        parent::closeConnection();
                        echo "<script type='text/javascript'>
                            alert('O cadastro não foi feito com sucesso, ' +
                            'por favor tente novamente');
                        </script>"; 
                        return false;
                    }

                } else {
                    parent::closeConnection();
                    
                    echo "<script type='text/javascript'>
                        alert('email já cadastrado');
                    </script>"; 

                    return false;
                }

            } else {
                echo "<script type='text/javascript'>
                    alert('Erro ao cadastrar dados: formato de email' +
                    ' não valido');
                </script>";

                return false;
            }

        } else return false;
    
    }

    /** 
     * função que cadastra um professor no banco de dados, retorno booleano
     * @param nome - nome da pessoa
     * @param email - email da pessoa
     * @param senha - senha do usuario
     * @return bool
    */
    public function cadastrarProfessor($nome, $email, $senha): bool {

        $senhaEncripty = sha1(sha1($senha));

        if(!(is_null($nome) || is_null($email) || is_null($senha))) {
            //testar se o email tem o formato valido.
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                //testar se o email ainda não foi cadastrado.
                $pdo = parent::connection();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'SELECT email FROM professor where email = ?';
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $email, PDO::PARAM_STR);
                $stm->execute();
                $retorno = $stm->fetch(PDO::FETCH_OBJ);

                if(!is_object($retorno)){

                    $pdo = parent::connection();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = 'INSERT INTO professor(nome, email, senha) VALUES (?,?,?)';
                    $stm = $pdo->prepare($sql);
                    $stm->bindValue(1, $nome, PDO::PARAM_STR);
                    $stm->bindValue(2, $email, PDO::PARAM_STR);
                    $stm->bindValue(3, $senhaEncripty, PDO::PARAM_STR);

                    //testa se o cadastro foi feito com sucesso;
                    if($stm->execute()){
                        parent::closeConnection();
                        return true;
                    } else {
                        parent::closeConnection();
                        echo "<script type='text/javascript'>
                            alert('O cadastro não foi feito com sucesso,
                            por favor tente novamente')
                        </script>"; 
                        parent::closeConnection();
                        return false;
                    }

                    
                } else {
                    parent::closeConnection();
                    echo "<script type='text/javascript'>
                        alert('email já cadastrado');
                    </script>"; 

                    return false;
                }
                
            } else {

                echo "<script type='text/javascript'>
                    alert('erro ao cadastrar dados: formato de E-mail não aceito')
                </script>";

                return false;
            }

        } else 
            return false;
    }

    /** 
     * função que cadastra uma questão no banco de dados, retorno booleano
     * @param enunciado - enunciado da questao
     * @param materia - materia
     * @param professorId - id do professor que está cadastrando a questao
     * @param altA - alternativa A
     * @param altB - alternativa B
     * @param altC - alternativa C
     * @param altD - alternativa D
     * @param altE - alternativa E
     * @param altCorreta - alternativa correta
     * @return bool
    */
    public function cadastrarQuestao(
        $enunciado, $materia, $professorId, 
        $altA, $altB, $altC, $altD, $altE, $altCorreta
        ): bool {

        if(!(is_null($enunciado) || is_null($materia) || 
            is_null($professorId) || is_null($altA) || is_null($altB) ||
            is_null($altC) || is_null($altD) || is_null($altE) || 
            is_null($altCorreta)
        )) {
                //colocar dados no banco

                $pdo = parent::connection();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'INSERT INTO questao(
                    enunciado, materia, professor_id, alternativa_a, 
                    alternativa_b, alternativa_c, alternativa_d,
                    alternativa_e, correta 
                ) VALUES (?,?,?,?,?,?,?,?,?)';
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $enunciado, PDO::PARAM_STR);
                $stm->bindValue(2, $materia, PDO::PARAM_STR);
                $stm->bindValue(3, $professorId, PDO::PARAM_INT);
                $stm->bindValue(4, $altA, PDO::PARAM_STR);
                $stm->bindValue(5, $altB, PDO::PARAM_STR);
                $stm->bindValue(6, $altC, PDO::PARAM_STR);
                $stm->bindValue(7, $altD, PDO::PARAM_STR);
                $stm->bindValue(8, $altE, PDO::PARAM_STR);
                $stm->bindValue(9, $altCorreta, PDO::PARAM_STR);

                //testa se o cadastro foi feito com sucesso;
                if($stm->execute()){
                    parent::closeConnection();
                    return true;
                } else {
                    echo "<script type='text/javascript'>
                        alert('O cadastro não foi feito com sucesso,
                         por favor tente novamente')
                    </script>"; 
                    parent::closeConnection();
                    return false;
                }

                parent::closeConnection();
        } else 
            return false;
    }
    
}

