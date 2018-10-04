<!DOCTYPE html>
<html lang="pt-BR">
    <?php
    require_once("logica-login.php");
    verificaLoginC();
    $resultado = mysqli_query($conexao, "select * from mecanicos");
    ?>
    <head>
        <title>Faça seu cadastro - OffGrid</title>
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
            <a href="logout-cliente.php" class="logar">
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
            <h1 class="titulo_lo">Avalie uma oficina</h1>
            <section class="oficina_lista">
                <?php
                while($oficinas = mysqli_fetch_assoc($resultado)){?>
                <div class="oficina_item">
                    <h1><?= $oficinas['nome_oficina']; ?></h1>
                    <h2>Endereço: <?= $oficinas['endereco_oficina']; ?></h2>
                    <h2>Nº: <?= $oficinas['numero_endereco']; ?></h2>
                    <h2>Bairro: <?= $oficinas['bairro_oficina']; ?></h2>
                </div><?php } ?>
            </section>
        </main>
        <footer class="rodape">
            <p>OffGrid</p>
        </footer>
    </body>
</html>