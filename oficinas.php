<!DOCTYPE html>
<html lang="pt-BR">
    <?php
    require_once("logica-login.php");
    verificaLoginC();
    $cep = $_GET["of"];
    $cep = mysqli_real_escape_string($conexao, $cep);
    $query = "select * from mecanicos where cep_oficina = '{$cep}'";
    $resultado = mysqli_query($conexao, $query);
    $mecanico = mysqli_fetch_assoc($resultado);
    $endereco = $mecanico["endereco_oficina"];
    ?>
    <head>
        <title><?= $mecanico["nome_oficina"]; ?> - OffGrid</title>
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
            <h1><?= $mecanico["nome_oficina"]; ?></h1>
            <h2 class="endereco_js"><?= $mecanico["endereco_oficina"];?>, <?= $mecanico["numero_endereco"];?> - <?= $mecanico["cidade_oficina"];?></h2>
            <div class="map_caixa">
                <div id="map"></div>
            </div>
        </main>
        
        <footer class="rodape">
            <p>OffGrid</p>
        </footer>
    </body>
    <script src="script/menu.js"></script>
    <script src="script/mapa.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDurID7F61y52duIL5pdmyD3lKq1YvXQGU&callback=initMap">
    </script>
</html>