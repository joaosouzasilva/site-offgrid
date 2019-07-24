<?php
require_once("logica-login.php");
verificaLoginM();
require_once("banco-usuario.php");
$mecanico = buscaUsuarioMC($conexao, $_SESSION["mecanico_logado"]);
$query = "select * from comentarios where mecanico_id = '{$mecanico['id']}'";
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

$nps = NPS($conexao, $mecanico['id'], $tr);
?>
<!DOCTYPE html>
<html>
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
            <a href="http://www.offgrid.com.br" class="logo_link">
                <img class="logo" src="imagens/logo.jpg" alt="Logo da OffGrid">
            </a>
            <a href="http://www.offgrid.com.br" class="logo_link_responsivo">
                <img class="logo" src="imagens/ESSE.jpg" alt="Logo da OffGrid">
            </a>
            <a href="logout-mecanico.php" class="logar">
                <img class="user_icon" src="imagens/usericon.png">
                Sair
            </a>
        </header>
        <main class="pagina_avaliacoes">
            <h1 class="titulo"><?= $mecanico['nome_oficina'] ?></h1>
            <h1 class="titulo">Avaliações</h1>
            <section class="oficina_lista">
                <h1>Comentários</h1>
                <?php while ($comentarios = mysqli_fetch_assoc($limite)) { ?>
                    <div class="oficina_item">
                        <p><?= $comentarios['cliente_id'] ?></p>
                        <p><?= $comentarios['texto'] ?></p>
                        <div class="nota">
                            <?php
                            $media = $comentarios['nota'];
                            if($media > 0.75){?> <span class="estrela fa fa-star"></span>
                            <?php }
                            if($media > 1.75){?> <span class="estrela fa fa-star"></span>
                            <?php }
                            if($media > 2.75){?> <span class="estrela fa fa-star"></span>
                            <?php }
                            if($media > 3.75){?> <span class="estrela fa fa-star"></span>
                            <?php }
                            if($media > 4.75){?> <span class="estrela fa fa-star"></span>
                            <?php } 
                            if($media > 0.25 && $media <= 0.75 || $media > 1.25 && $media <= 1.75 || $media > 2.25 && $media <= 2.75 || $media > 3.25 && $media <= 3.75 || $media > 4.25 && $media <= 4.75){?> <span class="estrela fa fa-star-half"></span>
                            <?php } ?>
                        </div>
                    </div>
                <?php }
                ?>
            </section>
            <section class="avaliacoes_detalhes">
                <h1>Detalhe</h1>
                
            </section>
        </main>
    </body>
    <script src="script/menu.js"></script>
</html>