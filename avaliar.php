<?php
require_once("logica-login.php");
verificaLoginC();
require_once("banco-usuario.php");
$cliente = buscaUsuarioCC($conexao, $_SESSION["cliente_logado"]);
$id = $_GET["of"];
$id = mysqli_real_escape_string($conexao, $id);
$query = "select * from mecanicos where id = '{$id}'";
$resultado = mysqli_query($conexao, $query);
if(mysqli_num_rows($resultado) == 0){
    header("Location: oficinas");
    die();
}
$mecanico = mysqli_fetch_assoc($resultado);
if(($cliente['agendado'] != $mecanico["id"])){
	header("Location: agendar?of={$mecanico}");
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
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
                    <li><a href="oficinas">OFICINAS</a></li>
                    <li><a>OFERTAS</a></li>
                    <li><a>NOVIDADES</a></li>
                </ul>
            </nav>
        </header>
        <main class="conteudo">
        	<h1 class="titulo">Avalie esta oficina</h1>
        	<form>
        		<div>
        			<h1>Que nota você dá para o serviço</h1>
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
        			<h1>Qual o principal motivo dessa nota?</h1>
        			<input type="text" name="texto">
        		</div>
        		<div>
        			<h1>Dê uma nota para o serviço nos seguintes quesitos:</h1>
        			<h2>Confiança</h2>
					<div class="rating">
                        <label>
                            <input type="radio" name="confianca" value="1" />
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="confianca" value="2" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="confianca" value="3" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>   
                        </label>
                        <label>
                            <input type="radio" name="confianca" value="4" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="confianca" value="5" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                    </div>
                    <h2>Qualidade</h2>
					<div class="rating">
                        <label>
                            <input type="radio" name="qualidade" value="1" />
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="qualidade" value="2" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="qualidade" value="3" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>   
                        </label>
                        <label>
                            <input type="radio" name="qualidade" value="4" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="qualidade" value="5" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                    </div>
                    <h2>Custo–Benefício</h2>
					<div class="rating">
                        <label>
                            <input type="radio" name="custo_beneficio" value="1" />
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="custo_beneficio" value="2" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="custo_beneficio" value="3" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>   
                        </label>
                        <label>
                            <input type="radio" name="custo_beneficio" value="4" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="custo_beneficio" value="5" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                    </div>
                    <h2>Agilidade</h2>
					<div class="rating">
                        <label>
                            <input type="radio" name="agilidade" value="1" />
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="agilidade" value="2" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="agilidade" value="3" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>   
                        </label>
                        <label>
                            <input type="radio" name="agilidade" value="4" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="agilidade" value="5" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                    </div>
                    <h2>Organização</h2>
					<div class="rating">
                        <label>
                            <input type="radio" name="organizacao" value="1" />
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="organizacao" value="2" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="organizacao" value="3" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>   
                        </label>
                        <label>
                            <input type="radio" name="organizacao" value="4" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                        <label>
                            <input type="radio" name="organizacao" value="5" />
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                            <span class="icon fa fa-star"></span>
                        </label>
                    </div>
        		</div>
        		<button></button>
        	</form>
        </main>
    </body>
</html>
