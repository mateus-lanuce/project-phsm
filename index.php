<?php 

    

?> 

<DOCTYPE! html>
<html lang="pt-br">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta chaset="utf-8" />
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <title>Simulado Online</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Simulados Online</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
             </li>
        </ul>
        <a href="src/login/login.html"><button type="button" class="btn btn-light mr-sm-2">Entrar</button></a>
        <a href="src/Register/Register.html"><button type="button" class="btn btn-light mr-sm-2">Cadastre-se</button></a>
    </div>
    </nav>

    <section>
        <br><br>
        <div class="jumbotron text-center">
            <div class="container">
                <h1>Simulados Online</h1>

                <p>Sejam bem vindos ao melhor site de simulados online. Aqui você encontra um grande
                    banco de questões, que são elaboradas por professores com um amplo conhecimento 
                    em suas respesctivas áreas, e além do mais você pode filtrar por matérias.
                </p>

                <p>
                    <a href="src/Register/Register.html" class="btn btn-primary my-2">Cadastre-se</a>
                </p>
            </div>
        </div>
    </section>
    
</body>

</html>
