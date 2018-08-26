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
            <h1 class="titulo">Criar conta - Mecânico</h1>
            <section class="formularios_lista">
                <form class="formulario" action="cm-concluido.php" method="post">
                    <h1>Dados da oficina</h1>
                    <input class="campo_texto campo_grande" name="nome_oficina" placeholder="Nome da oficina *" required>
                    <input class="campo_texto" name="telefone_mecanico" placeholder="Telefone" type="tel" required>
                    <input class="campo_texto" name="cnpj" placeholder="CNPJ" required>
                    <h1>Endereço da oficina</h1>
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
                    <input class="campo_texto campo_grande" name="endereco_oficina" placeholder="Endereço" required>
                    <input class="campo_texto" name="numero_endereco" placeholder="Número" type="number">
                    <input class="campo_texto" name="complemento" placeholder="Complemento">
                    <h1>Representante Legal</h1>
                    <input class="campo_texto campo_grande" name="nome_mecanico" placeholder="Nome completo *" required>
                    <input class="campo_texto" name="email_mecanico" placeholder="Email *" type="email" required>
                    <input class="campo_texto" name="celular_mecanico" placeholder="Celular do responsável" type="tel">
                    <input class="campo_texto" id="senhajs" name="senha_mecanico" placeholder="Crie uma senha *" type="password" required>
                    <input class="campo_texto" id="senhajs_2" name="senha_mecanico_2" placeholder="Confirmar senha *" type="password" required>
                    <p class="senha_valida" id="valida_senha">Senhas não conferem</p>
                    <button type="submit" class="botao_enviar">Enviar</button>
                </form>
            </section>
        </main>
        <footer class="rodape">
            <p>OffGrid</p>
        </footer>
    </body>
    <script src="script/inscricao.js"></script>
</html>