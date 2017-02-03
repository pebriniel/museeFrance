<?php

require_once "inc/libs.php";

$router->setBasePath('/'.PREFIX_PORTAL);

$router->map('GET', '/', function(){
	$index = true;
	require __DIR__ . '/inc/controler/home.php';
}, 'home');

$router->map('GET', '/favoris/', function(){
	$index = true;
	require __DIR__ . '/inc/controler/favoris.php';
}, 'favoris');

$router->map('GET', '/favoris/[h:id]/', function($id){
	$index = true;
	require __DIR__ . '/inc/controler/favoris.php';
}, 'favoris_id');

$router->map('POST', '/like/[h:id]/', function($id){
	$index = true;
	require __DIR__ . '/inc/controler/like.php';
}, 'like');

$router->map('POST', '/dislike/[h:id]/', function($id){
	$index = true;
	require __DIR__ . '/inc/controler/dislike.php';
}, 'dislike');

$router->map('GET', '/musee/[h:id]/', function($id){
	$index = true;
	require __DIR__ . '/inc/controler/musee.php';
}, 'musee');

$router->map('GET | POST', '/contact/', function(){
	$index = true;
	require __DIR__ . '/inc/controler/contact.php';
}, 'contact');

$router->map('GET | POST', '/apropos/', function(){
	$index = true;
	require __DIR__ . '/inc/controler/apropos.php';
}, 'apropos');



/* -- utilisateur -- */
$router->map('GET | POST', '/connexion/', function(){
	$index = true;
	require __DIR__ . '/inc/controler/users/connexion.php';
}, 'connexion');

$router->map('GET | POST', '/inscription/', function(){
	$index = true;
	require __DIR__ . '/inc/controler/users/inscription.php';
}, 'inscription');

$router->map('GET', '/activation/[h:key]/', function($key){
	$index = true;

	require __DIR__ . '/inc/controler/users/activation.php';
}, 'activation');

$router->map('GET', '/deconnexion/', function(){
	$index = true;
	require __DIR__ . '/inc/controler/users/deconnexion.php';
}, 'deconnexion');





$match = $router->match();


// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
		$mustache_options =  array('extension' => EXT_MU_TPL);
		if($match['name'] != 'apercuAjax'){

			//callHeader($m, array('HREF' => 'css/style.css'));
		}

		call_user_func_array( $match['target'], $match['params'] );
} else {
		// no route was matched
<<<<<<< HEAD
		// header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
		callTemplate("404page");
=======
		header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
}
