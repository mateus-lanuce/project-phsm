<?php

	require '../../src/login.php';

	$login = new Login();
	$email = (isset($_POST['Email']) ? $_POST['Email'] : null);
	$senha = (isset($_POST['Senha']) ? $_POST['Senha'] : null);
	$cargo = (isset($_POST['Cargo']) ? $_POST['Cargo'] : null);

	if($login->entrar($email, $senha, $cargo)){
		switch ($cargo) {
			case 1:
				header('Location:../secret_professor.php');
				break;
			case 2:
				header('Location:../secret_aluno.php');
				break;
		}
	}

?>

  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>Entrar</title>
      <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
      <link rel="stylesheet" href="style.css" type="text/css" />
</head>

  <body>
     <section class="form-section">
     <div class="login">
     <div class="form"> 
          <form action="login.php" method="POST">
            <center>
              <img src="../imgs/icon3.png" height="200px"><br>
              <h5>ENTRAR</h5><br>
            </center>

            <input type="text" placeholder="Email" name="Email" id="login-email" required/>

            <input type="password" placeholder="Senha" name="Senha" id="login-password"required/>

            <select class="browser-default custom-select" name="Cargo" required>
              <option selected>Você é?</option>
              <option value="1">Professor</option>
              <option value="2">Aluno</option>
            </select>

            <button type="submit" class="btn-login">Entrar</button>

            <center>
              <br>
              <a href="../Register/Register.php" id="a-login">Cadastre-se</a>
            </center>
          </form>
		</div>
		</div>
    
      </section>

      <!-- <script src="script.js"></script> -->
    </body>
  </html>
