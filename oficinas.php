<?php
require_once("banco-usuario.php");
$query_todos = "select * from mecanicos";
$total_reg = "20";
$pagina=$_GET['pagina'];
if (!$pagina) {
$pc = "1";
} else {
$pc = $pagina;
}
$inicio = $pc - 1;
$inicio = $inicio * $total_reg;
$todos = mysqli_query($conexao, $query_todos);
$limite = mysqli_query($conexao, "$query_todos LIMIT $inicio, $total_reg");
$tr = mysqli_num_rows($todos);
$tp = $tr / $total_reg;
$anterior = $pc -1;
$proximo = $pc +1;

$query_join = "select mecanicos.id, comentarios.nota from mecanicos left join comentarios on mecanicos.id = comentarios.mecanico_id";
$join = mysqli_query($conexao, $query_join);
$i = 0;
while ($comentarios = mysqli_fetch_assoc($join)) {
    $vetor_mecanicos_join[$i] = $comentarios['id'];
    $vetor_notas[$i] = $comentarios['nota'];
    $i++;
}
$n = 0;
$j = 0;
$vetor_mecanicos[$j] = $vetor_mecanicos_join[0];
for($i = 0; $i < count($vetor_mecanicos_join); $i++){
    if(!isset($vetor_medias[$j])){
        $vetor_medias[$j] = 0;
    }
    $vetor_medias[$j] += $vetor_notas[$i];
    $n++;
    if(($i+1 != count($vetor_mecanicos_join)) && ($vetor_mecanicos_join[$i] != $vetor_mecanicos_join[$i+1])){
        $vetor_medias[$j] /= $n;
        $n = 0;
        $j++;
        $vetor_mecanicos[$j] = $vetor_mecanicos_join[$i+1];
        $vetor_medias[$j] = 0;
    }

}
array_multisort($vetor_notas, SORT_DESC, $vetor_mecanicos_join, SORT_ASC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
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
        </header>
        <main class="pagina_lista_oficinas">
            <h1 class="titulo">Avalie uma oficina</h1>
            <section class="oficina_lista">
                <h1>Lista de oficinas</h1>
                <?php
                for($j = $inicio; $j < ($inicio + $total_reg) && $j < count($vetor_mecanicos); $j++){
                    $oficinas = buscaMecanicoPorID($conexao, $vetor_mecanicos[$j]); ?>
                <div class="oficina_item">
                    <a href="agendar?of=<?= $oficinas['id']; ?>"><?= $oficinas['nome_oficina']; ?></a>
                    <h2>Endereço: <?= $oficinas["endereco_oficina"];?>, <?= $oficinas["numero_endereco"];?> - <?= $oficinas["bairro_oficina"];?></h2>
                    <div class="nota">
                        <?php
                        $media = $vetor_medias[$j];
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
                </div><?php } ?>
                <?php 
                if ($pc>1) {?>
                <div class="botao_enviar botao_anterior">
                    <a href='?pagina=<?= $anterior; ?>'>Anterior</a>
                </div>
                <?php }
                if ($pc<$tp) {?>
                <div class="botao_enviar botao_proximo">
                    <a href='?pagina=<?= $proximo; ?>'>Próximo</a><?php } ?>
                </div>
            </section>
            <section class="adicionar_oficina">
                <form class="formulario" action="nova-oficina.php" method="post">
                    <h1>Adicionar oficina</h1>
                        <input class="campo_texto" name="nome" placeholder="Nome" required>
                        <input class="campo_texto" name="bairro" placeholder="Bairro" required>
                        <input class="campo_texto" name="logradouro" placeholder="Endereço" required>
                        <input class="campo_texto" name="numero" placeholder="Número">
                    <button type="submit" class="botao_enviar">Enviar</button>
                </form>
            </section>
        </main>
        <footer class="rodape">
            <p>OffGrid</p>
        </footer>
    </body>
    <script src="script/menu.js"></script>
</html>