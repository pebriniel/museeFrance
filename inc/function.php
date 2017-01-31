<?php

/**
     * affiche le résultat de moustache
     * 
	 * @param string 	$file	nom du fichier html à chargé
     * @param array		$array 	contient les données à faire afficher
     * 
     * @return string  	affiche le résultat de moustache
     * 
     * @access public
     * 
     */
	 
function callTemplate($file, $array = array()){
    $mustache_options =  array('extension' => EXT_MU_TPL);
      $m = new Mustache_Engine(array(
          'loader' => new Mustache_Loader_FilesystemLoader(FOLD_TEMPLATE, $mustache_options),
      ));

	$user = new user();
	$c = $user->userConnected();
	$connected = false;
	if($c['id'] > 0){
		$connected = true;
	}
	
      $array = array_merge($array, array('URL' => URL_PORTAL, 'USER_CONNECT' => $connected));

    echo $m->render($file, $array);
}

/**
     * retourne le résultat de moustache
     * 
	 * @param string 	$file	nom du fichier html à chargé
     * @param array		$array 	contient les données à faire afficher
     * 
     * @return string  	retourne le résultat de moustache
     * 
     * @access public
     * 
     */

function callTemplateReturn($file, $array = array()){
    $mustache_options =  array('extension' => EXT_MU_TPL);
      $m = new Mustache_Engine(array(
          'loader' => new Mustache_Loader_FilesystemLoader(FOLD_TEMPLATE, $mustache_options),
      ));
	  
	$user = new user();
	$c = $user->userConnected();
	$connected = false;
	if($c['id'] > 0){
		$connected = true;
	}
	
	$array = array_merge($array, array('URL' => URL_PORTAL, 'USER_CONNECT' => $connected));

    return $m->render($file, $array);
}

/**
     * Fonction qui permet de tester les valeurs entrés par l'utilisateur
     * 
	 * @param string 	$data		entrée de l'utilisateur
	 * 
     * @return string  	Returns		renvoi une entrée clean de l'utilisateur
     * 
     * @access public
     * 
     */

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

/**
     * Fonction qui permet l'envoi d'un e-mail
     * 
	 * @param string 	$mail		l'e-mail de l'utilisateur
	 * @param string 	$sujet		Objet de l'e-mail (sujet)
	 * @param string 	$fichier	fichier html faisant le corps de l'e-mail (template)
	 * @param array 	$var		array contenant les différents clés et valeurs devant être changé dans le fichier html
	 * 
     * 
     * @access public
     * 
     */

function function_mail($mail, $sujet, $fichier, $var){

	if(preg_match("#^[a-z0-9._-]+@(gmail).[a-z]{2,4}$#", $mail))  // On filtre les serveurs qui présentent des bogues.
	{	
		$passage_ligne = "\r\n";
		$_gmail = false;
	}
	else if(preg_match("#^[a-z0-9._-]+@(outlook).[a-z]{2,4}$#", $mail)){
		$passage_ligne = PHP_EOL;
		$_gmail = false;
	}
	else
	{	
		$passage_ligne = "\r\n";
		$_gmail = false;
	}
	
	//=====Déclaration des messages au format texte et au format HTML.
	//$message_html = "<html><head></head><body>Bienvenue <b>$pseudo</b> :) <br/> <br/>Lien d'activation : <br/><a href=$url_activation>Lien d'activation</a></body></html>";
	$message_html = file_get_contents(FOLD_EMAIL."$fichier");
	foreach($var AS $key => $v){
		$message_html = preg_replace("#".$key."#", $v, $message_html);
	}
	
	//==========
	 
	//=====Création de la boundary.
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	//==========
	 
	//=====Création du header de l'e-mail.
	$header = "From: \"dat'art\"<datArt@mail.fr>".$passage_ligne;
	$header.= "Reply-to: \"dat'art\" <datArt@mail.fr>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	if(!$_gmail){ $header.= 'Content-type: text/html; charset=utf-8'."".$passage_ligne; }
	if($_gmail){ $header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne; }
	//==========
	 $message = "";
	//=====Ajout du message au format HTML.
	if($_gmail){ 	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
					$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				}
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	 
	//=====On ferme la boundary alternative.
	$message.= $passage_ligne;
	//==========

	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
	 
	//==========
}