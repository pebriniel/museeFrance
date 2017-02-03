<?php

if(isset($index)){

	$user = new user();

	if(!$user->userConnected()){
		$user->userActivation($key);
		$res = array('SHOW' => true, 'content' => 'Votre compte est activé.');
	}
	else{
		$res = array('SHOW' => false, 'content' => 'Vous êtes connecté.');
	}

	callTemplate("users/deconnexion", $res);
}
