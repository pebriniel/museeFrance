<?php

if($_SERVER['REMOTE_ADDR'] == "127.0.0.1"){
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_DATA', 'table');
	define('PREFIX_DB', 'PREFIX_');

	define('PREFIX_PORTAL', 'musee');
	define('URL_PORTAL', 'http://localhost/'.PREFIX_PORTAL.'/');

	define('FOLD_EMAIL', 'template/email/');
	define('FOLD_TEMPLATE', 'template');

	define('EXT_MU_TPL', '.html');
	define('CUSTOM_KEY_MDP', 'f6dcade5c83aaed162b7ddd44ff5effef76b6f1a');
}
else{
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'password');
    define('DB_DATA', 'table'); //nom de la table
	define('PREFIX_DB', 'PREFIX_'); //prefix des tables  
 
	define('PREFIX_PORTAL', 'musee'); //utile à AltoRouter
	define('URL_PORTAL', 'http://votresite.fr/'.PREFIX_PORTAL.'/');

	define('FOLD_EMAIL', 'template/mail/');
	define('FOLD_TEMPLATE', 'template');

	define('EXT_MU_TPL', '.html');
	define('CUSTOM_KEY_MDP', 'f6dcade5c83aaed162b7ddd44ff5effef76b6f1a'); //f6dcade5c83aaed162b7ddd44ff5effef76b6f1a
}
