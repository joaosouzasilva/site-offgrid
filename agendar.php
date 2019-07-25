<?php
require_once("logica-login.php");
verificaLoginC();
require_once("banco-usuario.php");
$cliente = buscaUsuarioCC($conexao, $_SESSION["cliente_logado"]);
$id = $_GET["of"];
$id = mysqli_real_escape_string($conexao, $id);
$query = "select * from mecanicos where id = '{$id}'";
$resultado = mysqli_query($conexao, $query);
if(mysqli_num_rows($resultado) == 0){
    header("Location: oficinas");
    die();
}
$mecanico = mysqli_fetch_assoc($resultado);
$endereco = $mecanico["endereco_oficina"];
if($cliente['agendado'] == $mecanico["id"]){
    header("Location: avaliar?of={$mecanico}");
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
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
            <a href="http://www.offgrid.com.br" class="logo_link">
                <img class="logo" src="imagens/logo.jpg" alt="Logo da OffGrid">
            </a>
            <a href="http://www.offgrid.com.br" class="logo_link_responsivo">
                <img class="logo" src="imagens/ESSE.jpg" alt="Logo da OffGrid">
            </a>
            <a href="logout-cliente.php" class="logar">
                <img class="user_icon" src="imagens/usericon.png">
                Sair
            </a>
            <nav class="painel_nav">
                <ul>
                    <li><a href="https://offgridoficinas.wixsite.com/website">INÍCIO</a></li>
                    <li><a href="oficinas">OFICINAS</a></li>
                    <li><a>OFERTAS</a></li>
                    <li><a>NOVIDADES</a></li>
                </ul>
            </nav>
        </header>
        <main class="conteudo">
            <h1 class="titulo"><?= $mecanico["nome_oficina"]; ?></h1>
            <h2 class="endereco_desc"><?= $mecanico["endereco_oficina"];?>, <?= $mecanico["numero_endereco"];?> - <?= $mecanico["bairro_oficina"];?></h2>
            <section class="avaliar_oficina">
                <div class="map_caixa">
                    <div id="map"></div>
                </div>
                <form class="formulario" action="agendamento-feito.php" method="post">
                    <h1>Agendar serviço</h1>
                    <textarea rows="7" maxlength="255" name="mensagem" class="campo_texto campo_grande" placeholder="Escreva uma mensagem para o mecânico."></textarea>
                    <button type="submit" class="botao_enviar" value="<?= $mecanico["id"]; ?>" name="mecanico_id">Enviar</button>
                    <?php
                    if(isset($_SESSION["avaliacao_enviada"])){ ?>
                        <p class="senha_invalida"><?=$_SESSION["avaliacao_enviada"]?></p>
                    <?php } unset($_SESSION["avaliacao_enviada"])
                    ?>
                </form>
            </section>
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