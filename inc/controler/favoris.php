<?php

if(isset($index)){

	$user = new user();
	if($u = $user->userConnected()){
		$musee = new musee();
		$data = $musee->museeFavoris($u['id']);	
		
		$array = array('SHOW' => true, 'LIST' => $data);
	}
	else{
		$array = array('SHOW' => false);
	}

	callTemplate("favoris", $array);
}

