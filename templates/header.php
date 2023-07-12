<?php
include_once("config/URL.php");
include_once("config/process.php");

//limpar mensagem deixada apos executar algum comando dentro da agenda seja cria contato ou excluir ou alterado
if (isset($_SESSION['msg'])){
    $printMSG = $_SESSION['msg'];
    $_SESSION['msg'] = '';
};

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contatos</title>
    <!-- BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.3/cerulean/bootstrap.min.css" integrity="sha512-1rXsIsq9uaj3bxRth2+Mw1slRDxuPzGlfJ8PaLmkO3/OtvCL7jVQrdxaC1VvCmCzKRMdKu0pmbCtqQz/3/xORA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS -->
    <link rel="stylesheet" href="<?=$BASE_URL?>/css/styles.css">
</head>
<body>
    <header>
        <nav class="narbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand"href="<?=$BASE_URL?>index.php">
            <img src="<?=$BASE_URL?>/img/logo (1).svg" alt="agenda">
        </a>
        <div>
            <div class="navbar-nav">
                <a class="nav-link active" id= "home-link" href="<?=$BASE_URL?>index.php">Agenda</a>
                <a class="nav-link active"  href="<?=$BASE_URL?>create.php">Adicionar Contato</a>

            </div>
        </div>

        </nav>
        
    </header>