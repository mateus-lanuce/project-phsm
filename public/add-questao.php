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

    $enunciado = isset($_GET['enunciado']) ? $_GET['enunciado'] : null;
    $materia = isset($_GET['materia']) ? $_GET['materia'] : null;
    $alternativa_a = isset($_GET['Alternativa_a']) ? $_GET['Alternativa_a'] : null;
    $alternativa_b = isset($_GET['Alternativa_b']) ? $_GET['Alternativa_b'] : null;
    $alternativa_c = isset($_GET['Alternativa_c']) ? $_GET['Alternativa_c'] : null;
    $alternativa_d = isset($_GET['Alternativa_d']) ? $_GET['Alternativa_d'] : null;
    $alternativa_e = isset($_GET['Alternativa_e']) ? $_GET['Alternativa_e'] : null;
    $correta = isset($_GET['correta']) ? $_GET['correta'] : null;

    $create->cadastrarQuestao($enunciado, $materia, $logado->id , 
        $alternativa_a, $alternativa_b, $alternativa_c, $alternativa_d, $alternativa_e,
        $correta);

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
        <a class="navbar-brand js-scroll-trigger" href="secret_professor.php">SIMULADOS - ONLINE</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
        <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="add-questao.php">Adicionar Questão</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Professor <?php echo $logado->nome?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="perfil-professor.php"><img class="mr-2" src="img/perfil.png" width="20px">Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="sair.php"><img class=" mb-1 mr-2" src="img/sair.png" width="18px">Sair</a>
                    </div>
                </li>
            </ul>
      </div>
    </div>
    </nav>
    <br><br><br><br><br><br>

    <h1 class=" mb-3 text-center text-secondary">Adicionar Questão</h1>

    <div class="container">
        <div class="jumbotron">
            <form method="GET" action="add-questao.php"> 
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
                            <select class="browser-default custom-select" name="materia" width="20%" required>
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
                        </div>
                    </div>  
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome"><strong>Alternativa A</strong></label>
                            <input type="text" class="form-control" name="Alternativa_a"
                            placeholder="Informe a alternativa A" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome"><strong>Alternativa B</strong></label>
                            <input type="text" class="form-control" name="Alternativa_b" 
                            placeholder="Informe a alternativa B" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome"><strong>Alternativa C</strong></label>
                            <input type="text" class="form-control" name="Alternativa_c" 
                            placeholder="Informe a alternativa C" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome"><strong>Alternativa D</strong></label>
                            <input type="text" class="form-control" name="Alternativa_d" 
                            placeholder="Informe a alternativa D" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nome"><strong>Alternativa E</strong></label>
                            <input type="text" class="form-control" name="Alternativa_e" 
                            placeholder="Informe a alternativa E" required>
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
                        <button type="submit" class="btn btn-secondary mr-sm-2">Adicionar Questão</button>
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
                    <a href="secret-professor.php"> Simulados Online</a>.</p>
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
    <!-- <script src="../js/jqBootstrapValidation.js"></script> -->
    <script src="../js/contact_me.js"></script>
    <script src="../js/freelancer.min.js"></script>

</body>

</html>
