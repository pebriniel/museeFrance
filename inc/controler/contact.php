<?php

if(isset($index)){

	function sendEmail($email,$destinataire,$message){


    	$headers[]  = 'MIME-Version: 1.0';
    	$headers[] = 'Content-type: text/html; charset=UTF-8';

    	// En-têtes additionnels
    	$headers[] = "To: destinataire <". $destinataire .">";
    	$headers[] ="From : <". $email .">";
		
		$objet = "Demande d'information";
 
		mail ( $destinataire,$objet,$message,implode("\r\n",$headers));
	}
	
	$array = array();
	
	if(isset($_REQUEST['connexion'])){
	  $email=test_input($_REQUEST['email']);
	  $destinataire="boussad.s@codeur.online";
	  $message=test_input($_REQUEST['message']);
		$err = "";
	  
		if($email && $message){
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$form = true;
				$ok = false;
				$refresh = false;
				$content = "E-mail invalide";
			}
			else{
				$form = false;
				$content = "Message envoyé";
				$ok = true;
				$refresh = true;
				sendEmail($email,$destinataire,$message);
			}
			$array = array('FORM' => $form, 'CONTENT' => $content);
		}
		else{
			$form = true;
			$content = "Remplissez tous les champs";
			$ok = false;
			$refresh = false;
		}
	}
	else{
		$form = true;
		$content = "";
		$ok = false;
		$refresh = false;
	}
	
	$array = array('FORM' => $form, 'CONTENT' => $content, 'REFRESH' => $refresh, 'OK' => $ok);
	callTemplate("contact", $array);
}
