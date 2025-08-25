<?php

session_start();

if (!isset($_SESSION['token'])) {
    header('Location: cadastro/Cadastro.php'); // Redirecionar para a página de cadastro se não estiver autenticado
    exit();
    echo "Você não está autenticado. Por favor, faça o cadastro.";
}
require_once __DIR__ . '/dao/CampoDAO.php';
require_once __DIR__ . '/model/Campo.php';
require_once __DIR__ . '/dao/ModuloDAO.php';
require_once __DIR__ . '/model/Modulo.php';


$camposDAO = new CampoDAO();
$campos = $camposDAO->listarCamposPorEmpresa($_SESSION['id_empresa']);

$moduloDAO = new ModuloDAO();
$modulos = $moduloDAO->listarModulosPorEmpresa($_SESSION['id_empresa']);

if(isset($_GET['id'])){
    $id_campo = $_GET['id'];
    $modulos = $moduloDAO->listarModulosPorCampo($id_campo,$_SESSION['id_empresa']);
}



?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão & Solução</title>
    <link rel="stylesheet" href="../css/styles3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <img src="logo.png" alt="Logo">
            </div>
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Pesquisa">
            </div>
            <div class="title">
                <h1>Gestão & Solução</h1>
            </div>
            <div class="menu-icon">
                <i class="fas fa-bars"></i>
            </div>
            <a href="acoes/sair.php"><button>Sair</button></a>
        </header>

        <aside class="sidebar">
            <?php foreach ($campos as $campo): ?>
                <a href="?id=<?= $campo->getIdCampo(); ?>">
                    <nav>
                        <ul>
                            <li style="background-color: <?= $campo->getCor(); ?>"><?= $campo->getNome(); ?></li>
                        </ul>
                    </nav>
                </a>
            <?php endforeach; ?>
            <div class="add-button">
                <a href="acoes/Addcampo.php"><i class="fas fa-plus-circle"></i></a>
            </div>
        </aside>

        <main class="main-content">

            <ul>
                <?php foreach ($modulos as $modulo): ?>
                    <li><a href="#"><?= $modulo->getNome(); ?></a></li>
                <?php endforeach; ?>
            </ul>

            <?php if(isset($_GET['id'])): ?>
                <a href="acoes/Adicionarmodulo.php?id_campo=<?= $_GET['id']; ?>">Adicionar</a>
            <?php endif; ?>

        </main>
    </div>
</body>

</html>