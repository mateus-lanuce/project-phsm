<?php

    require_once 'DB/conexao.class.php';

//classe com tudo que for necessario para fazer login.
class Login extends Conexao{

    /**
     * função que faz o login do usuario e salva as sessions
     * @param email - email do usuario já cadastrado
     * @param senha - senha do usuario
     * @param cargo - diz se ele é professor ou aluno
     */
    public function entrar($email, $senha, $cargo) {
        
        if(!(is_null($email) || is_null($senha) || is_null($cargo))){
            //testar se formato de email é valido
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $senhaEncrypt = sha1(sha1($senha));

                $tab = ($cargo == 1) ? 'professor' : 'aluno';

                //testar se o email já foi cadastrado.
                $pdo = parent::connection();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM $tab where email = ?";
                $stm = $pdo->prepare($sql);
                $stm->bindValue(1, $email, PDO::PARAM_STR);
                $stm->execute();
                $retorno = $stm->fetch(PDO::FETCH_OBJ);
                parent::closeConnection();

                if(is_object($retorno)) {
                    session_start();

                    if($retorno->senha == $senhaEncrypt) {
                        $_SESSION['id'] = $retorno->id;
                        $_SESSION['nome'] = $retorno->nome;
                        $_SESSION['email'] = $retorno->email;
                        $_SESSION['logado'] = true;
                        return true;
                    } else {
                        echo "<script type=text/javascript> 
                        alert('Senha errada, por favor digite novamente');
                        </script>";
                        return false;
                    }

                } else {
                    echo "<script type=text/javascript> 
                        alert('Por favor, cadastre-se!');
                    </script>";
                    return false;
                }


            } else {
                echo "<script type=text/javascript> 
                        alert('Por favor, Digite um email valido');
                    </script>";
                return false;
            }
        } else
            return false;
    }
}
