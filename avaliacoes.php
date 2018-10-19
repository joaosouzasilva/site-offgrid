<!DOCTYPE html>
<html>
    <?php
    require_once("logica-login.php");
    verificaLoginM();
    require_once("banco-usuario.php");
    $mecanico = buscaUsuarioMC($conexao, $_SESSION["mecanico_logado"]);
    $query = "select * from comentarios where mecanico_id = '{$mecanico['id']}'";
    $comentarios = mysqli_query($conexao, $query);
    ?>
    <head>
        <title>Avaliações - OffGrid</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="imagens/icon.jpg">
        <link rel="stylesheet" href="estilos/estilo.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    </head>
    <body>
        <header class="cabecalho">
            <a href="#" class="hamburger">&#9776;</a>
            <img class="logo" src="imagens/logo.jpg" alt="Logo da OffGrid">
            <a href="logout-mecanico.php" class="logar">
                <img class="user_icon" src="imagens/usericon.png">
                Sair
            </a>
            <nav class="painel_nav">
                <ul>
                    <li><a href="https://offgridoficinas.wixsite.com/website">INÍCIO</a></li>
                    <li><a>OFICINAS</a></li>
                    <li><a>OFERTAS</a></li>
                    <li><a>NOVIDADES</a></li>
                </ul>
            </nav>
        </header>
        <main class="conteudo">
            <h1 class="titulo">Avaliações</h1>
            <?php
            while($comentario = mysqli_fetch_assoc($comentarios)){
                echo $comentario['texto'];
            }
            ?>
        </main>
    </body>
    <script src="script/menu.js"></script>
</html>