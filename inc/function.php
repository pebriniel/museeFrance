<?php

/**
     * Call Mustach with file html and array content
<<<<<<< HEAD
     *
	 * @param string 	$file	the file of html template
     * @param array		$array 	the array content for template
     *
     * @return string  	Returns an echo of template html
     *
     * @access public
     *
     */

=======
     * 
	 * @param string 	$file	the file of html template
     * @param array		$array 	the array content for template
     * 
     * @return string  	Returns an echo of template html
     * 
     * @access public
     *  
     */
	 
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
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
<<<<<<< HEAD

	$musee = new musee();
	if($connected){
		$listMuseeFavoris = sizeof($musee->museeFavoris($c['id']));
	}
	else{

	}
      $array = array_merge($array, array('URL' => URL_PORTAL, 'NB_MUSEE_HEADER_LIKE' => $listMuseeFavoris, 'USER_CONNECT' => $connected));
=======
	
      $array = array_merge($array, array('URL' => URL_PORTAL, 'USER_CONNECT' => $connected));
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3

    echo $m->render($file, $array);
}

/**
     * Call Mustach with file html and array content
<<<<<<< HEAD
     *
	 * @param string 	$file	name file html
     * @param array		$array 	the array content for template
     *
     * @return string  	Returns an string of template html
     *
     * @access public
     *
=======
     * 
	 * @param string 	$file	name file html 
     * @param array		$array 	the array content for template
     * 
     * @return string  	Returns an string of template html
     * 
     * @access public
     * 
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
     */

function callTemplateReturn($file, $array = array()){
    $mustache_options =  array('extension' => EXT_MU_TPL);
      $m = new Mustache_Engine(array(
          'loader' => new Mustache_Loader_FilesystemLoader(FOLD_TEMPLATE, $mustache_options),
      ));
<<<<<<< HEAD

=======
	  
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
	$user = new user();
	$c = $user->userConnected();
	$connected = false;
	if($c['id'] > 0){
		$connected = true;
	}
<<<<<<< HEAD

=======
	
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
	$array = array_merge($array, array('URL' => URL_PORTAL, 'USER_CONNECT' => $connected));

    return $m->render($file, $array);
}

/**
     * Call a battery test for entry of user
<<<<<<< HEAD
     *
	 * @param string 	$data	entry of user
	 *
     * @return string  	Returns a string clean
     *
     * @access public
     *
=======
     * 
	 * @param string 	$data	entry of user
	 * 
     * @return string  	Returns a string clean
     * 
     * @access public
     * 
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
     */

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

/**
     * Send a e-mail to user
<<<<<<< HEAD
     *
=======
     * 
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
	 * @param string 	$mail		e-mail of user
	 * @param string 	$sujet		object e-mail
	 * @param string 	$fichier	file template html for e-mail
	 * @param array 	$var		array content key and value replace in template html
<<<<<<< HEAD
	 *
     *
     * @access public
     *
=======
	 * 
     * 
     * @access public
     * 
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
     */

function function_mail($mail, $sujet, $fichier, $var){

	if(preg_match("#^[a-z0-9._-]+@(gmail).[a-z]{2,4}$#", $mail))  // On filtre les serveurs qui présentent des bogues.
<<<<<<< HEAD
	{
=======
	{	
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
		$passage_ligne = "\r\n";
		$_gmail = false;
	}
	else if(preg_match("#^[a-z0-9._-]+@(outlook).[a-z]{2,4}$#", $mail)){
		$passage_ligne = PHP_EOL;
		$_gmail = false;
	}
	else
<<<<<<< HEAD
	{
		$passage_ligne = "\r\n";
		$_gmail = false;
	}

=======
	{	
		$passage_ligne = "\r\n";
		$_gmail = false;
	}
	
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
	//=====Déclaration des messages au format texte et au format HTML.
	//$message_html = "<html><head></head><body>Bienvenue <b>$pseudo</b> :) <br/> <br/>Lien d'activation : <br/><a href=$url_activation>Lien d'activation</a></body></html>";
	$message_html = file_get_contents(FOLD_EMAIL."$fichier");
	foreach($var AS $key => $v){
		$message_html = preg_replace("#".$key."#", $v, $message_html);
	}
<<<<<<< HEAD

	//==========

=======
	
	//==========
	 
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
	//=====Création de la boundary.
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	//==========
<<<<<<< HEAD

=======
	 
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
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
<<<<<<< HEAD

=======
	 
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
	//=====On ferme la boundary alternative.
	$message.= $passage_ligne;
	//==========

	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
<<<<<<< HEAD

	//==========
}
=======
	 
	//==========
}
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
