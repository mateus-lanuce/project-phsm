<?php 

    

?> 

<DOCTYPE! html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta chaset="utf-8" />
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <title>Editar perfil - Aluno</title>
    <link href="../css/freelancer.min.css" rel="stylesheet">
</head>

<body>
    <!-- Menu de Navegação -->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercas fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="indexAluno.php">SIMULADOS - ONLINE</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
        <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Aluno X
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="perfil-aluno.php"><img class="mr-2" src="img/perfil.png" width="20px"></img>Perfil</a>
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

    <h1 class=" mb-3 text-center text-secondary">Editar Perfil</h1>

<div class="container">
        <div class="jumbotron">
            <div class="row">   
                <div class="col12">
                    <img class="ml-5" src="img/usuario-logado.png" width="150px"></img>   
                </div>
                <form method="POST">
                    <div class="row">
                        <label class="ml-5 mt-2" for="name">Nome: 
                            <?php echo "Fulano" ?>
                        </label>
                    </div>
                    <br>
                    <div class="row">
                        <label class="ml-5" for="email">Email: 
                            <?php echo "fulaninho@gmail.com"  ?>
                        </label>
                    </div>
                    <br>
                    <div class="row">
                        <label class="ml-5" for="cargo">Cargo: 
                            <?php echo "Aluno"  ?>
                        </label>
                    </div>
                </form>
            </div>
            <p class="text-right"><a href="ep-aluno.php"><button type="button" class="btn btn-secondary mr-sm-2">Salvar Alterações</button></a><p>
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
