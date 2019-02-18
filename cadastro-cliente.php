<!DOCTYPE html>
<html lang="pt-BR">
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
            <img class="logo" src="imagens/logo.jpg" alt="Logo da OffGrid">
            <a href="#" class="logar">
                <img class="user_icon" src="imagens/usericon.png">
                Sair
            </a>
        </header>
        <main class="conteudo">
            <h1 class="titulo">Criar conta - Cliente</h1>
            <section class="formularios_lista">
                <form class="formulario" action="cc-concluido.php" method="post" accept-charset="utf-8">
                    <h1>Insira seus dados</h1>
                    <input class="campo_texto" name="nome_cliente" placeholder="Nome completo *" required>
                    <input class="campo_texto" name="email_cliente" placeholder="Email *" required>
                    <input class="campo_texto" id="senhajs" name="senha_cliente" placeholder="Crie uma senha *" required>
                    <input class="campo_texto" id="senhajs_2" name="senha_cliente_2" placeholder="Confirmar senha" required>
                    <p class="senha_valida" id="valida_senha">Senhas não conferem</p>
                    <button type="submit" class="botao_enviar" required>Enviar</button>
                </form>
            </section>
        </main>
        <footer class="rodape">
            <p>OffGrid</p>
        </footer>
    </body>
    <script src="script/inscricao.js"></script>
</html>