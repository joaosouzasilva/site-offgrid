<!DOCTYPE html>
<html lang="pt-BR">
    <?php include("logica-login.php"); ?>
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
            <a href="#" class="hamburger">&#9776;</a>
            <img class="logo" src="imagens/logo.jpg" alt="Logo da OffGrid">
            <a href="#" class="logar">
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
            <h1 class="titulo">OffGrid</h1>
            <div class="pagina_login">
                <section class="sobre">
                    <p>A OffGrid é o site que une oficinas mecânicas e clientes, oferecendo informações e avaliações dos serviços para que o cliente escolha melhor onde consertar o seu veículo, o mecânico alcance mais clientes e ambos possam interagir de forma prática e segura.</p>
                </section>
                <section class="formularios_lista">
                    <form class="formulario" action="lm-concluido.php" method="post">
                        <h1>Mecânicos</h1>
                        <input class="campo_texto" name="email_mecanico" placeholder="Email">
                        <input class="campo_texto" name="senha_mecanico" placeholder="Senha" type="password">
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
                        <div class="divisao">
                            <hr class="linha_div">
                            <p>ou</p>
                            <hr class="linha_div">
                        </div>
                        <a href="cadastro-mecanico" class="botao_enviar">Criar conta</a>
                    </form>
                    <form class="formulario" action="lc-concluido.php" method="post">
                        <h1>Clientes</h1>
                        <input class="campo_texto" name="email_cliente" placeholder="Email">
                        <input class="campo_texto" name="senha_cliente" placeholder="Senha" type="password">
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
                        <div class="divisao">
                            <hr class="linha_div">
                            <p>ou</p>
                            <hr class="linha_div">
                        </div>
                        <a href="cadastro-cliente" class="botao_enviar">Criar conta</a>
                    </form>
                </section>
            </div>
        </main>
        <footer class="rodape">
            <p>OffGrid</p>
        </footer>
    </body>
    <script src="script/menu.js"></script>
</html>