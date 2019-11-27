<?php

require './DB/conexao.class.php';

//classe com todos os metodos que fazem cadastro no banco.
class Create extends Conexao{

    
    //função que cadastra um aluno no banco de dados, retorno booleano
    public function cadastrarAluno($nome, $email, $senha): bool {

        $senhaEncripty = sha1($senha);

        if(!(is_null($nome) || is_null($email) || is_null($senha))) {
            //testar se o email tem o formato valido.
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $pdo = parent::connection();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = 'INSERT INTO aluno(nome, email, senha) VALUES (?,?,?)';
                $stm = $pdo->prepare($sql);

                //testa se o cadastro foi feito com sucesso;
                if($stm->execute(array($nome, $email, $senhaEncripty))){
                    parent::closeConnection();
                    return true;
                } else {
                    echo "<script type='text/javascript'>
                        alert('O cadastro não foi feito com sucesso,
                         por favor tente novamente')
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
    

}
