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
            <a href="#" class="hamburger">&#9776;</a>
            <img class="logo" src="imagens/logo.jpg" alt="Logo da OffGrid">
            <a href="#" class="logar">
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
            <h1 class="titulo">OffGrid</h1>
            <div class="pagina_login">
                <section class="sobre">
                    <p>A OffGrid é o site que une oficinas mecânicas e clientes, oferecendo informações e avaliações dos serviços para que o cliente escolha melhor onde consertar o seu veículo, o mecânico alcance mais clientes e ambos possam interagir de forma prática e segura.</p>
                </section>
                <section class="formularios_mecanico">
                    <form class="formulario" action="cm-concluido.php" method="post" accept-charset="utf-8">
                        <h1>Cadastre sua oficina</h1>
                        <input class="campo_texto campo_grande" name="nome_oficina" placeholder="Nome da oficina *" required>
                        <input class="campo_texto" name="telefone_oficina" placeholder="Telefone" type="tel" required>
                        <input class="campo_texto" name="cep_oficina" placeholder="CEP" type="number" required>
                        <select class="campo_texto" id="estado_oficina" name="estado_oficina" placeholder="Estado" required>
                            <option value="AC" >Acre</option>
                            <option value="AL" >Alagoas</option>
                            <option value="AP" >Amapá</option>
                            <option value="AM" >Amazonas</option>
                            <option value="BA" >Bahia</option>
                            <option value="CE" >Ceará</option>
                            <option value="DF" >Distrito Federal</option>
                            <option value="ES" >Espírito Santo</option>
                            <option value="GO" >Goiás</option>
                            <option value="MA" >Maranhão</option>
                            <option value="MT" >Mato Grosso</option>
                            <option value="MS" >Mato Grosso do Sul</option>
                            <option value="MG" >Minas Gerais</option>
                            <option value="PA" >Pará</option>
                            <option value="PB" >Paraíba</option>
                            <option value="PR" >Paraná</option>
                            <option value="PE" >Pernambuco</option>
                            <option value="PI" >Piauí</option>
                            <option value="RJ" >Rio de Janeiro</option>
                            <option value="RN" >Rio Grande do Norte</option>
                            <option value="RS" >Rio Grande do Sul</option>
                            <option value="RO" >Rondônia</option>
                            <option value="RR" >Roraima</option>
                            <option value="SC" >Santa Catarina</option>
                            <option value="SP" >São Paulo</option>
                            <option value="SE" >Sergipe</option>
                            <option value="TO" >Tocantins</option>
                        </select>
                        <input class="campo_texto" name="cidade_oficina" placeholder="Cidade" required>
                        <input class="campo_texto" name="bairro_oficina" placeholder="Bairro" required>
                        <input class="campo_texto" name="endereco_oficina" placeholder="Endereço" required>
                        <input class="campo_texto" name="numero_endereco" placeholder="Número" type="number">
                        <input class="campo_texto" name="complemento" placeholder="Complemento">
                        <input class="campo_texto" name="email_mecanico" placeholder="Email *" type="email" required>
                        <input class="campo_texto" id="senhajs" name="senha_mecanico" placeholder="Crie uma senha *" type="password" required>
                        <input class="campo_texto" id="senhajs_2" name="senha_mecanico_2" placeholder="Confirmar senha *" type="password" required>
                        <p class="senha_valida" id="valida_senha">Senhas não conferem</p>
                        <button type="submit" class="botao_enviar">Enviar</button>
                    </form>
                    <form class="formulario" action="lm-concluido.php" method="post">
                        <h1>Fazer login</h1>
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
                    </form>
                </section>
                <section class=".formularios_cliente">
                    <form class="formulario" action="cc-concluido.php" method="post" accept-charset="utf-8">
                        <h1>Insira seus dados</h1>
                        <input class="campo_texto" name="nome_cliente" placeholder="Nome completo *" required>
                        <input class="campo_texto" name="email_cliente" placeholder="Email *" required>
                        <input class="campo_texto" id="senhajs" name="senha_cliente" placeholder="Crie uma senha *" required>
                        <input class="campo_texto" id="senhajs_2" name="senha_cliente_2" placeholder="Confirmar senha" required>
                        <p class="senha_valida" id="valida_senha">Senhas não conferem</p>
                        <button type="submit" class="botao_enviar" required>Enviar</button>
                    </form>
                    <form class="formulario" action="lm-concluido.php" method="post">
                        <h1>Fazer login</h1>
                        <input class="campo_texto" name="email_mecanico" placeholder="Email" required>
                        <input class="campo_texto" name="senha_mecanico" placeholder="Senha" required type="password">
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