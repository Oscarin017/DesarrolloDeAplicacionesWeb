<?php
	require '../../Mailer/PHPMailerAutoload.php';
	extract($_POST);

	$mail = new PHPMailer;

	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'asistencia.utt@gmail.com';
	$mail->Password = 'camelutt';
	$mail->SMTPSecure = 'tsl';
	$mail->Port = 587;
	$mail->From = 'asistencia.utt@gmail.com';
	$mail->FromName = 'Sistema de Asistencia';
	$mail->addAddress( $Correo, $Alumno);
	$mail->addAddress( $CorreoT, $Alumno)
	$mail->isHTML(true);                              
	$mail->Subject = 'Sistema de Asistencias';
	$mail->Body    = '<h1>Sistema de Asistencia</h1></br><p>El alumno: '.$Alumno.' no asistio a la clase: '.$Grupo.' el dia:'.$Fecha.' </p>';
	$mail->AltBody = 'Correo de Prueba';
	if(!$mail->send()) {
	    echo 'Message could not be sent.';
    	echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
    	echo 'Message has been sent';
	}
?>