<?php 
    session_start();
    //se não existir a sessão
    require '../src/read.php';

    $logado = null;
    $read = new Read();

    if ((!isset($_SESSION['logado'])) == true) {
        unset($_SESSION['logado']);
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location:../index.php');
    } else {
        $logado = $read->mostrarUsuario($_SESSION['id'], 'aluno');
    }
    // session_destroy();

    $materia = isset($_GET['materia']) ? $_GET['materia'] : null;

    $read->mostrarQuestaoMateria($materia);
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta chaset="utf-8" />
    <title>Simulado Online</title>
    <link href="css/freelancer.min.css" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <!-- Menu de Navegação -->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercas fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="secret_aluno.php">SIMULADOS - ONLINE</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
        <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="navbar-nav ml-auto"><a class="nav-link py-3 px-0 px-lg-3 roundded js-scroll-trigger text-white">Pontuação: <?php echo $logado->pontuacao ?></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Aluno(a) <?php echo $logado->nome ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="perfil-aluno.php"><img class="mr-2" src="img/perfil.png" width="20px">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="sair.php"><img class=" mb-1 mr-2" src="img/sair.png" width="18px">Sair</a>
                    </div>
                </li>
            </ul>
      </div>
    </div>
    </nav>
    <br><br><br><br><br><br>

    <!-- Filtrar questões -->
    <h1 class=" mb-3 text-center text-secondary">Questões</h1>
    <div class="container">
        <div class="jumbotron">
            <center>
                <div class="col-3">
                    <form method="GET" action="secret_aluno.php">
                        <select class="browser-default custom-select" name ="materia" width="20%">
                            <option selected>Disciplina</option>
                            <option value="Matemática">Matemática</option>
                            <option value="Química">Química</option>
                            <option value="Física">Física</option>
                            <option value="Biologia">Biologia</option>
                            <option value="História">História</option>
                            <option value="Geografia">Geografia</option>
                            <option value="Filosofia">Filosofia</option>
                            <option value="Sociologia">Sociologia</option>
                            <option value="Português">Português</option>
                            <option value="Inglês">Inglês</option>
                            <option value="Espanhol">Espanhol</option>
                       </select>

                        <button type="submit" class="mt-4 mb-0 btn btn-secondary mr-sm-2">Filtrar</button>
                    </form>
                </div>
            <br>
            </center>
        </div>
    </div>

    <!-- Mostrar questões -->

    <div class="container">
        <div class="jumbotron">
            <p>
                1) Podemos afirmar que uma notícia informa a situação da indústria brasileira num tom mais ameno 
                enquanto outra usa um tom menos otimista? Justifique sua resposta em exemplos extraídos dos
                dois textos.
            </p>
            <br>
            <p>
                <button type="button" class="btn btn-outline-primary rounded-circle ml-5">A</button> Altenativa A
                <br><br>
                <button type="button" class="btn btn-outline-primary rounded-circle ml-5">B</button> Altenativa B
                <br><br>
                <button type="button" class="btn btn-outline-primary rounded-circle ml-5">C</button> Altenativa C
                <br><br>
                <button type="button" class="btn btn-outline-primary rounded-circle ml-5">D</button> Altenativa D
                <br><br>
                <button type="button" class="btn btn-outline-primary rounded-circle ml-5">E</button> Altenativa E
            </p>
            <br>
            <hr>    
        </div>
    </div>




    <!-- Footer -->

    <footer class="footer text-center">
        <div class="container">
            <center>
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Volte Sempre</h4>
                    <p class="lead mb-0">O melhor site de questões para concursos públicos -
                    <a href="secret_aluno.php"> Simulados Online</a>.</p>
                </div>
            </center>
        </div>
    </footer>

    <section class="copyright py-4 text-center text-white">
        <div class="container">
            <small>Copyright &copy; Todos os direitos reservados - 2019</small>
        </div>
    </section>

    <div class="scroll-to-top d-lg-none position-fixed ">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    </nav>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="js/freelancer.min.js"></script>
</body>

</html>
