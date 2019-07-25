<!DOCTYPE html>
<html lang="pt-BR">
    <?php require_once("logica-login.php"); ?>
    <head>
        <title>OffGrid</title>
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
        </header>
        <main class="conteudo pagina_login">
            <p class="sobre">A OffGrid é o site que une oficinas mecânicas e clientes, oferecendo informações e avaliações dos serviços para que o cliente escolha melhor onde consertar o seu veículo, o mecânico alcance mais clientes e ambos possam interagir de forma prática e segura.</p>
            <section class="fazer_login">
                <p></p>
                <form class="formulario" action="lm-concluido.php" method="post">
                    <h1>Entre como mecânico e veja o que seus clientes acham de sua oficina</h1>
                    <input class="campo_texto" name="email_mecanico" placeholder="Email" required>
                    <input class="campo_texto" name="senha_mecanico" placeholder="Senha" required type="password">
                    <button type="submit" class="botao_enviar">Login</button>
                    <?php
                    if(isset($_SESSION["deslogado_m"])){ ?>
                        <p class="senha_invalida"><?=$_SESSION["deslogado_m"]?></p>
                    <?php } unset($_SESSION["deslogado_m"])
                    ?>
                    <?php
                    if(isset($_SESSION["logout_sucesso_m"])){ ?>
                        <p class="senha_invalida"><?=$_SESSION["logout_sucesso_m"]?></p>
                    <?php } unset($_SESSION["logout_sucesso_m"])
                    ?>
                    <?php
                    if(isset($_SESSION["ja_cadastrado_M"])){ ?>
                        <p class="senha_invalida"><?=$_SESSION["ja_cadastrado_M"]?></p>
                    <?php } unset($_SESSION["ja_cadastrado_M"])
                    ?>
                </form>
                <form class="formulario" action="lc-concluido.php" method="post">
                    <h1>Entre como cliente e descubra quais são as melhores oficinas de Caruaru</h1>
                    <input class="campo_texto" name="email_cliente" placeholder="Email" required>
                    <input class="campo_texto" name="senha_cliente" placeholder="Senha" required type="password">
                    <button type="submit" class="botao_enviar">Login</button>
                    <?php
                    if(isset($_SESSION["deslogado_c"])){ ?>
                        <p class="senha_invalida"><?=$_SESSION["deslogado_c"]?></p>
                    <?php } unset($_SESSION["deslogado_c"])
                    ?>
                    <?php
                    if(isset($_SESSION["logout_sucesso_c"])){ ?>
                        <p class="senha_invalida"><?=$_SESSION["logout_sucesso_c"]?></p>
                    <?php } unset($_SESSION["logout_sucesso_c"])
                    ?>
                    <?php
                    if(isset($_SESSION["ja_cadastrado_C"])){ ?>
                        <p class="senha_invalida"><?=$_SESSION["ja_cadastrado_C"]?></p>
                    <?php } unset($_SESSION["ja_cadastrado_C"])
                    ?>
                </form>
            </section>
            <section class="cadastrar">
                <p>Ainda não é cadastrado? Crie uma conta agora</p>
                <section class="botoes_cadastrar">
                    <a href="/cadastro-mecanico" class="botao_enviar">Como oficina</a>
                    <a href="/cadastro-cliente" class="botao_enviar">Como cliente</a>
                </section>
            </section>
        </main>
        <footer class="rodape">
            <p>OffGrid</p>
        </footer>
    </body>
</html>