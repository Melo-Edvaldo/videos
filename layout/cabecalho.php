<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?php echo $titulo; /*Personalizando o título*/ ?>
    </title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">
            <img src="<?php
                if(isset($logo) && !empty($logo))
                { // Se existe ou está vazio retorna a logo encontrada
                    echo $logo;
                } else
                {
                    echo "./img/logoPHP.png";
                }
                ?>" alt="Logo" width="90" height="48"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Página Inicial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./usuarios.php">Usuários</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="./produtos.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produtos
                            </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./cadastro_produtos.php">Cadastro</a></li>
                        <li><a class="dropdown-item" href="./pesquisa_produtos.php">Pesquisa</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="./estoque.php">Estoque</a></li>
                    </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./clientes.php" aria-disabled="true">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./vendas.php" aria-disabled="true">Vendas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./colaboradores.php" aria-disabled="true">Colaboradores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./cep.php" aria-disabled="true">CEP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pokemon.php" aria-disabled="true">Pokémon</a>
                        </li>
                    </ul>
                </div>
    </div>
</nav>

<div class="container mt-4"> <!-- mt-4 significa margin top e 4 significa distância -> 4 unidades-->