<?php
//INPUTS POST
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$headers = "Content-Type: text/plain;charset=utf-8\r\n";
$headers .= "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

//SENDING DATA
$corpo = "Formulário da página de contato\r\n";
$corpo .= "Nome: " . $name . "\r\n";
$corpo .= "Email: " . $email . "\r\n";
$corpo .= "Mensagem: " . $message . "\r\n";

//DESTINATION
$email_to = 'contato@aviva.com.br';
$status = mail($email_to, mb_encode_mimeheader($subject, "utf-8"), $corpo, $headers);
if ($status):
  //SUCCESS
  header('location:painel.php?status=sucesso');
else:
  //ERROR
  header('location:painel.php?status=erro');
endif;
?>
