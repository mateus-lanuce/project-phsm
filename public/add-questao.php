<?php 

session_start();
//se não existir a sessão
require '../src/read.php';
require '../src/create.php';

$logado = null;
$read = new Read();
$create = new Create();

if ((!isset($_SESSION['logado'])) == true) {
    unset($_SESSION['logado']);
    unset($_SESSION['id']);
    unset($_SESSION['nome']);
    unset($_SESSION['email']);
    header('Location:../index.php');
} else {
    $logado = $read->mostrarUsuario($_SESSION['id'], 'professor');
}
// session_destroy();

if(isset($_POST)){

    $enunciado = $_POST['enunciado'];
    $materia = $_POST['materia'];
    $alternativa_a = $_POST['alternativa-a'];
    $alternativa_b = $_POST['alternativa-b'];
    $alternativa_c = $_POST['alternativa-c'];
    $alternativa_d = $_POST['alternativa-d'];
    $alternativa_e = $_POST['alternativa-e'];
    $correta = $_POST['correta'];

    $create->cadastrarQuestao($enunciado, $materia, $_SESSION['id'], 
        $alternativa_a, $alternativa_b, $alternativa_c, $alternativa_d, $alternativa_e,
        $correta);
}

?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta chaset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Adicionar Questão</title>
    <link href="css/freelancer.min.css" rel="stylesheet">
</head>

<body>
    <!-- Menu de Navegação -->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercas fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="indexProfessor.php">SIMULADOS - ONLINE</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
        <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="m-questões.php">Minhas Questões</a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="add-questão.php">Adicionar Questão</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Professor <?php echo $logado->nome?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="perfil-professor.php"><img class="mr-2" src="img/perfil.png" width="20px"></img>Perfil</a>
                        <a class="dropdown-item" href="#"><img class="mr-2" src="img/configuracoes.png" width="20px"></img>Configurações</a>
                        <a class="dropdown-item" href="#">Outra ação</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><img class=" mb-1 mr-2" src="img/sair.png" width="18px"></img>Sair</a>
                    </div>
                </li>
            </ul>
      </div>
    </div>
    </nav>
    <br><br><br><br><br>

    <h1 class=" mb-3 text-center text-secondary">Adicionar Questão</h1>

    <div class="container">
        <div class="jumbotron">
            <form method="POST" action="add-questao.php"> 
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="nome"><strong>Enunciado</strong></label>
                            <input type="text" class="form-control" name="enunciado" 
                            placeholder="Informe o enunciado" required>   
                        </div>
                    </div>  
                </div>  
            
                <div class="row">
                    <div class="col-12">    
                        <div class="form-group">
                            <label for="nome"><strong>Disciplina</strong></label>
                            <select class="browser-default custom-select" nome="materia" width="20%">
                                <option selected>Disciplina</option>
                                <option value="1">Informática</option>
                            </select>
                        </div>
                    </div>  
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome"><strong>Alternativa A</strong></label>
                            <input type="text" class="form-control" name="Alternativa-a"
                            placeholder="Informe a alternativa A" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome"><strong>Alternativa B</strong></label>
                            <input type="text" class="form-control" name="Alternativa-b" 
                            placeholder="Informe a alternativa B" required>
                            </input>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome"><strong>Alternativa C</strong></label>
                            <input type="text" class="form-control" name="Alternativa-c" 
                            placeholder="Informe a alternativa C" required>
                            </input>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome"><strong>Alternativa D</strong></label>
                            <input type="text" class="form-control" name="Alternativa-d" 
                            placeholder="Informe a alternativa D" required>
                            </input>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome"><strong>Alternativa E</strong></label>
                            <input type="text" class="form-control" name="Alternativa-e" 
                            placeholder="Informe a alternativa E" required>
                            </input>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome"><strong>Alternativa Correta</strong></label>
                            <select class="browser-default custom-select" name="correta" width="20%">
                                <option selected>Alternativa Correta</option>
                                <option value="A">Alternativa A</option>
                                <option value="B">Alternativa B</option>
                                <option value="C">Alternativa C</option>
                                <option value="D">Alternativa D</option>
                                <option value="E">Alternativa E</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12" style="text-align: center;">
                        <a href="add-questao.php"><button type="button" class="btn btn-secondary mr-sm-2">Adicionar Questão</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <center>
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Volte Sempre</h4>
                    <p class="lead mb-0">O melhor site de questões para concursos públicos -
                    <a href="IndexAluno.php"> Simulados Online</a>.</p>
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

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>
    <script src="../js/freelancer.min.js"></script>

</body>

</html>
