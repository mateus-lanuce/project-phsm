<?php

require '../../src/create.php';

//pegar as variaveis 
$nome = (isset($_POST['Nome']) ? $_POST['Nome'] : null);
$email = (isset($_POST['Email']) ? $_POST['Email'] : null);
$senha = (isset($_POST['Senha']) ? $_POST['Senha'] : null);
$confSenha = (isset($_POST['Conf_Senha']) ? $_POST['Conf_Senha'] : null);
$cargo = (isset($_POST['Cargo']) ? $_POST['Cargo'] : null);

$objCreate = new Create();

if(isset($_POST)) {

	if($senha == $confSenha) {

		switch ($cargo) {
		//cargo = professor
		case 1:

			if ($objCreate->cadastrarProfessor($nome, $email, $senha)) {
				echo "<script>
					alert('Cadastro realizado com sucesso, ' + 
						'por favor faça login');
				</script>";
			}

			break;

		//cargo = aluno
		case 2:

			if ($objCreate->cadastrarAluno($nome, $email, $senha)) {
				echo "<script>
					alert('Cadastro realizado com sucesso, ' + 
						'por favor faça login');
				</script>";
			}

			break;
		}
	} else 
	echo "<script>
			alert('as senhas não coincidem, por favor tente novamente');
		</script>";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <section class="form-section">
 
     <div class="login">
     <div class="form"> 
         <form action="Register.php" method="POST">
            <center>
            <img src="../imgs/icon3.png" height="200px"><br>
            <h4>CADASTRE-SE</h4><br>
            </center>
  
            <input type="text" placeholder="Nome Completo" name="Nome" id="login-email" required/>
            <input type="text" placeholder="Email" name="Email" id="login-email" required/>
            <input type="password" placeholder="Senha" name="Senha" id="login-password" required/>
            <input type="password" placeholder="Confirmar Senha" name="Conf_Senha" id="login-password" required/>
            <select class="browser-default custom-select" required name="Cargo">
              <option selected>Você é?</option>
              <option value="1">Professor</option>
              <option value="2">Aluno</option>
            </select>
            <br><br>
            <button type="submit" class="btn-login" >Cadastrar-SE</button><br><br>
            <center>
                  <a href="../login/login.php" id="a-register">Entrar</a>
            </center>
          </form>
      </div>
      </div>

    </section>

    <script src="script.js"></script>
</body>

</html>