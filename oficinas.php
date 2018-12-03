<!DOCTYPE html>
<html lang="pt-BR">
    <?php
    require_once("banco-usuario.php");
    $query = "select * from mecanicos";
    $total_reg = "20";
    $pagina=$_GET['pagina'];
    if (!$pagina) {
    $pc = "1";
    } else {
    $pc = $pagina;
    }
    $inicio = $pc - 1;
    $inicio = $inicio * $total_reg;
    $limite = mysqli_query($conexao, "$query LIMIT $inicio, $total_reg");
    $todos = mysqli_query($conexao, $query);
    $tr = mysqli_num_rows($todos);
    $tp = $tr / $total_reg;
    $anterior = $pc -1;
    $proximo = $pc +1;
    ?>
    <head>
        <title>Lista de oficinas - OffGrid</title>
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
            <section class="avaliar_oficina">
                <div class="map_caixa">
                    <div id="map"></div>
                </div>
                <form class="formulario_avaliacao" action="avaliacao-enviada.php" method="post">
                    <h1>Avalie esta oficina</h1>
                    <section class="avaliacao_texto">
                        <textarea rows="7" maxlength="255" class="campo_texto" name="texto" placeholder="Comentário"></textarea>
                    </section>
                    <section class="de_sua_nota">
                        <h1>Dê sua nota</h1>
                        <div class="rating">
                            <label>
                                <input type="radio" name="nota" value="1" />
                                <span class="icon fa fa-star"></span>
                            </label>
                            <label>
                                <input type="radio" name="nota" value="2" />
                                <span class="icon fa fa-star"></span>
                                <span class="icon fa fa-star"></span>
                            </label>
                            <label>
                                <input type="radio" name="nota" value="3" />
                                <span class="icon fa fa-star"></span>
                                <span class="icon fa fa-star"></span>
                                <span class="icon fa fa-star"></span>   
                            </label>
                            <label>
                                <input type="radio" name="nota" value="4" />
                                <span class="icon fa fa-star"></span>
                                <span class="icon fa fa-star"></span>
                                <span class="icon fa fa-star"></span>
                                <span class="icon fa fa-star"></span>
                            </label>
                            <label>
                                <input type="radio" name="nota" value="5" />
                                <span class="icon fa fa-star"></span>
                                <span class="icon fa fa-star"></span>
                                <span class="icon fa fa-star"></span>
                                <span class="icon fa fa-star"></span>
                                <span class="icon fa fa-star"></span>
                            </label>
                        </div>
                    </section>
                    <button type="submit" class="botao_enviar" value="????" name="mecanico_id">Enviar</button>
                </form>
                <form class="formulario_avaliacao" action="avaliacao-enviada.php" method="post">
                    <h1>Nova oficina</h1>
                    <section class="avaliacao_texto">
                        <input type="text" name="nova_oficina" placeholder="Nome">
                        <input type="text" name="novo_endereco" placeholder="Endereço">
                    </section>
                    <button type="submit" class="botao_enviar" value="????" name="mecanico_id">Enviar</button>
                </form>
                <form class="formulario_avaliacao" action="avaliacao-enviada.php" method="post">
                    <h1>Agendar serviço</h1>
                    <section class="avaliacao_texto">
                        <textarea rows="7" maxlength="255" class="campo_texto" name="mensagem" placeholder="Mensagem"></textarea>
                        <select class="campo_texto" name="horario">
                            <option value="12:00" >12:00</option>
                        </select>
                    </section>
                    <button type="submit" class="botao_enviar" value="????" name="mecanico_id">Enviar</button>
                </form>
            </section>
            <section class="oficina_lista">
                <?php
                while($oficinas = mysqli_fetch_assoc($limite)){?>
                <div class="oficina_item">
                    <a href="avaliar?of=<?= $oficinas['id']; ?>"><?= $oficinas['nome_oficina']; ?></a>
                    <h2 class="endereco_js">Endereço: <?= $oficinas["endereco_oficina"];?>, <?= $oficinas["numero_endereco"];?> - <?= $oficinas["bairro_oficina"];?></h2>
                </div><?php } ?>
                <?php 
                if ($pc>1) {?>
                <a href='?pagina=<?= $anterior; ?>'>Anterior</a>
                <?php }
                if ($pc<$tp) {?>
                <a href='?pagina=<?= $proximo; ?>'>Próximo</a><?php } ?>
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