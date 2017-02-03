<?php

if(isset($index)){
	
	$user = new user();
	
	if(!$user->userConnected()){
		if(isset($_REQUEST['connexion'])){
			$res = $user->userConnexion();
			if($res['status'] <= -1){ $ok = false; } else{ $ok = true; }
			$res = array_merge($res, array('SHOW' => true, 'OK' => $ok, 'REFRESH' => $ok));
		}
		else{
			$res = array('SHOW' => true);
		}
	}
	else{
		$res = array('SHOW' => false, 'content' => 'Vous êtes connecté');
	}

	callTemplate("users/connexion", $res);
}
