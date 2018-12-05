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
            <h1 class="titulo">Avalie uma oficina</h1>
            <section class="avaliar_oficina">
                <form class="formulario" action="nova-oficina.php" method="post">
                    <h1>Nova oficina</h1>
                        <input class="campo_texto" name="nome" placeholder="Nome">
                        <input class="campo_texto" name="bairro" placeholder="Bairro">
                        <input class="campo_texto" name="endereco" placeholder="Endereço">
                    <button type="submit" class="botao_enviar">Enviar</button>
                </form>
            </section>
            <section class="oficina_lista">
                <?php
                while($oficinas = mysqli_fetch_assoc($limite)){?>
                <div class="oficina_item">
                    <a href="avaliar?of=<?= $oficinas['id']; ?>"><?= $oficinas['nome_oficina']; ?></a>
                    <h2 class="endereco_js">Endereço: <?= $oficinas["endereco_oficina"];?>, <?= $oficinas["numero_endereco"];?> - <?= $oficinas["bairro_oficina"];?></h2>
                    <div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-half checked"></span>
                    </div>
                </div><?php } ?>
                <?php 
                if ($pc>1) {?>
                <div class="botao_enviar">
                    <a href='?pagina=<?= $anterior; ?>'>Anterior</a>
                </div>
                <?php }
                if ($pc<$tp) {?>
                <div class="botao_enviar">
                    <a href='?pagina=<?= $proximo; ?>'>Próximo</a><?php } ?>
                </div>
            </section>
        </main>
        <footer class="rodape">
            <p>OffGrid</p>
        </footer>
    </body>
    <script src="script/menu.js"></script>
</html>