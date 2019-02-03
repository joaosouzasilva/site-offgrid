<?php
require_once("banco-usuario.php");
require_once("logica-login.php");
require_once("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mensagem = $_POST["mensagem"];
$mecanico = $_POST["mecanico_id"];

$mail = new PHPMailer();
try{
	$mail->isSMTP();
	$mail->Host = 'ns948.hostgator.com.br';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = 'true';
	$mail->Username = 'joao@offgrid.net.br';
	$mail->Password = '6X*6Y}p9lh[s';

	$mail->setFrom('joao@offgrid.net.br', 'OffGrid');
	$mail->addAddress('antnio.joao.joo393@gmail.com', 'João Silva');

	$mail->isHTML(true);
	$mail->Subject = 'Agendamento';
	$mail->Body = "<p>{$mensagem}</p>";
	$mail->AltBody = "{$mensagem}";

	$mail->send();

	agendar($conexao, $mecanico);
    header("Location: avaliar?of={$mecanico}");
}
catch(Exception $e){
	header("Location: agendar?of={$mecanico}");
}