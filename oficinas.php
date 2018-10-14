<!DOCTYPE html>
<html lang="pt-BR">
    <?php
    require_once("banco-usuario.php");
    $id = $_GET["of"];
    $id = mysqli_real_escape_string($conexao, $id);
    $query = "select * from mecanicos where id = '{$id}'";
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
            <h1 class="titulo"><?= $mecanico["nome_oficina"]; ?></h1>
            <h2 class="endereco_js"><?= $mecanico["endereco_oficina"];?>, <?= $mecanico["numero_endereco"];?> - <?= $mecanico["cidade_oficina"];?></h2>
            <section class="avaliar_oficina">
                <div class="map_caixa">
                    <div id="map"></div>
                </div>
                <form class="formulario_avaliacao" action="avaliacao-enviada.php" method="post">
                    <section class="avaliacao_texto">
                        <h1>Avaliar oficinca</h1>
                        <textarea rows="7" maxlength="255" class="campo_texto" name="texto" placeholder="Comentário"></textarea>
                    </section>
                    <section class="de_sua_nota">
                        <h1>Dê sua nota</h1>
                        <div class="rating">
                            <label>
                                <input type="radio" name="nota" value="1" />
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="nota" value="2" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="nota" value="3" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>   
                            </label>
                            <label>
                                <input type="radio" name="nota" value="4" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="nota" value="5" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                        </div>
                    </section>
                    <button type="submit" class="botao_enviar" value="<?= $mecanico["id"]; ?>" name="mecanico_id">Enviar</button>
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