<?php 
session_start();

include './../app/configuracao.php';
include './../app/autoload.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NOME ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?=URL?>/public/css/estilos.css" >
    <link rel="stylesheet" href="<?=URL?>/public/css/bootstrap.min.css" >
</head>
<body>

    <?php
        include '../app/Views/topo.php';
        $rotas = new Rota();
        include '../app/Views/rodape.php';
        
    ?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
<script src="<?=URL?>/public/js/jquery.funcoes.js" ></script>

</body>
</html>