<?php

$subjectPrefix = '[Contato do Site - Meta Construtech]';

$name = $_POST['name'];
$email = trim($_POST['email']);
$emaildestinatario = 'comercial@metaconstrutech.com.br';
$comment = $_POST['comment'];

$assunto = '[Contato do Site - Meta Construtech]';

$mensagemHTML = '<P>Seguem dados do contato:</P>
	<p><b>Nome:</b> ' . $name . '
	<p><b>E-mail:</b> ' . $email . '
	<p><b>Mensagem:</b> ' . $comment . '
	<hr>';

$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $email\r\n";
$headers .= 'Bcc: hebertdev82@gmail.com' . "\r\n";
$headers .= "Return-Path: $emaildestinatario \r\n";
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers);

if ($envio)
  echo "<script>alert('Obrigado! Sua mensagem foi enviada com sucesso! Entraremos em contato em breve!'); window.top.location.href = '/';</script>";