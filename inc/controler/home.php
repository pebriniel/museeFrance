<?php

header('Content-Type: text/html; charset=utf-8');

if(isset($index)){

	$user = new user();
	if($u = $user->userConnected()){

		$musee = new musee();
		$data_default = array('SHOW' => true);

		if(!isset($_COOKIE['region'])){
			$res = array('MAP' => true);
		}
		else{
			$val = $musee->myRandom($_COOKIE['region']);
            $pos=explode(" ", $val["coordonnees"]);
            $val['positionx']=$pos[0];
            $val['positiony']=$pos[1];
			$res = array_merge($val, array('MAP' => false));
		}
		$data = array_merge($res, $data_default);
	}
	else{
		$data = array('SHOW' => false);
	}

	//print_r($data);
	callTemplate("home", $data);

}
