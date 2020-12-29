<?php
date_default_timezone_set('America/Sao_Paulo');
 
require_once('./PHPMailer.php');
require_once('./SMTP.php');
require_once('./Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
if((isset($_POST['email']) && !empty(trim($_POST['email']))) && (isset($_POST['mensagem']) && !empty(trim($_POST['mensagem'])))) {
 
	$nome = !empty($_POST['nome']) ? $_POST['nome'] : 'Não informado';
	$email = $_POST['email'];
	$assunto = !empty($_POST['select']) ? utf8_decode($_POST['select']) : 'Não informado';
	$mensagem = $_POST['mensagem'];
	$data = date('d/m/Y H:i:s');
 
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.live.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'caioripoli@hotmail.com';
	$mail->Password = '';
    $mail->Port = 587;
    
 
	$mail->setFrom('caioripoli@hotmail.com');
	$mail->addAddress('caioripoli@hotmail.com');
 
	$mail->isHTML(true);
	$mail->Subject = $assunto;
	$mail->Body = "Nome: {$nome}<br>
				   Email: {$email}<br>
				   Mensagem: {$mensagem}<br>
				   Data/hora: {$data}";
 
	if($mail->send()) {
        echo "<script>window.location='index.php';alert('$nome, sua mensagem foi enviada com sucesso! Estaremos retornando em breve');</script>";
	} else {
		echo "<script>window.location='index.php';alert('$nome, sua mensagem não foi enviada! Fazer tentar novamente');</script>";
	}
} else {
	echo "<script>window.location='index.php';alert('Sua mensagem não foi enviada! Informar o email e a mensagem');</script>";
}
