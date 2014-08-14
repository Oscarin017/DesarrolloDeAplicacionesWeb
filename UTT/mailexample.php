<?php
	require 'PHPMailerAutoload.php';

	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'hector.glez4@gmail.com';
	$mail->Password = 'camelx94';
	$mail->SMTPSecure = 'ssl';
	$mail->From = 'hector.glez4@gmail.com';
	$mail->FromName = 'Hector Gonzalez Gonzalez';
	$mail->addAddress('hector.glez4@gmail.com', 'Hector Gonzalez');
	$mail->isHTML(true);                              
	$mail->Subject = 'Correo de Prueba';
	$mail->Body    = '<h1>Correo de Prueba</h1>';
	$mail->AltBody = 'Correo de Prueba';
	if(!$mail->send()) {
	    echo 'Message could not be sent.';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
    	echo 'Message has been sent';
	}
?>