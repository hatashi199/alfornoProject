<?php
	//Cogemos de inicio los datos de la consulta
    $email = "info@asotrame.com";

	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $asunto = $_POST['asunto'];
	$mensaje = nl2br($_POST['mensaje']);
	
	//Luego cogemos el texto y creamos el mensaje del email
	$texto = "<br><b>Nombre:</b> ".$nombre."<br>"
	."<b>Email:</b> ".$email."<br>"
    ."<b>Teléfono:</b> ".$telefono."<br>"
	."<b>Asunto:</b> ".$asunto."<br>"
	."<b>Consulta:</b> ".$mensaje."<br>"
	."<b>Consentimiento:</b> ".$consentimiento."<br>";

	
	//Plantamos el texto dentro de la plantilla y sustituimos las claves de la plantilla por los valores reales
	//$textoEmail = utf8_decode(file_get_contents("plantilla_email.html"));
	//$textoEmail = str_replace("|*TEXTO|*", $texto, $textoEmail);

	
	//Hizo click en el captcha
    /*
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6Lcn9LQZAAAAANx8WMrdRLP1nF2RYDcOPUoh34BU&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

		//Verificación validada correctamente
        if($responseData->success){
			//Por último, enviamos el email al usuario
				$email_usuario = "secretaria@revistacontroveria.es";
                $email_usuario = "diego@pintega.com";
				$headers = "From: " . strip_tags($email) . "\r\n";
                $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
                //$headers .= "CC: susan@example.com\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                mail($email_usuario, "Contacto desde la web", $texto, $headers);
                $mensaje = "El mensaje ha sido enviado, nos pondremos en contacto lo antes posible.";
		}
		else{
			$mensaje = "Creemos que eres un robot!";
		}		
	}
	else{
			$mensaje = "Indica que no eres un robot!";
	}
    */
    
    $email_usuario = "diego@pintega.com";
    $headers = "From: " . strip_tags($email) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($email) . "\r\n";
    //$headers .= "CC: susan@example.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    mail($email_usuario, "Contacto desde la web", $texto, $headers);
    echo "<p>El mensaje ha sido enviado, nos pondremos en contacto lo antes posible.</p>";

?>