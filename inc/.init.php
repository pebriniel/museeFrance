<?php

if($_SERVER['REMOTE_ADDR'] == "127.0.0.1"){
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_DATA', 'accueil');
	define('PREFIX_DB', '');

	define('PREFIX_PORTAL', 'musee');
	define('URL_PORTAL', 'http://boussads.student.codeur.online/'.PREFIX_PORTAL.'/');

	define('FOLD_EMAIL', 'template/email/');
	define('FOLD_TEMPLATE', 'template');

	define('EXT_MU_TPL', '.html');
	define('CUSTOM_KEY_MDP', 'f6dcade5c83aaed162b7ddd44ff5effef76b6f1a');
}
else{
    define('DB_HOST', 'localhost');
<<<<<<< HEAD
    define('DB_USER', 'root');
    define('DB_PASS', 'password');
    define('DB_DATA', 'db');
	define('PREFIX_DB', '');

	define('PREFIX_PORTAL', 'musee/');
	define('URL_PORTAL', 'http://www.boussads.student.codeur.online/'.PREFIX_PORTAL);
=======
    define('DB_USER', 'quentinp');
    define('DB_PASS', 'syUArx6xop');
    define('DB_DATA', 'quentinp');
	define('PREFIX_DB', 'MUSEE_');  
 
	define('PREFIX_PORTAL', 'musee');
	define('URL_PORTAL', 'http://www.boussads.student.codeur.online/'.PREFIX_PORTAL.'/');
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3

	define('FOLD_EMAIL', 'template/mail/');
	define('FOLD_TEMPLATE', 'template');

	define('EXT_MU_TPL', '.html');
<<<<<<< HEAD
	define('CUSTOM_KEY_MDP', 'f6dcade5c83aaed162b7ddd44ff5effef76b6f1a');
=======
	define('CUSTOM_KEY_MDP', ''); //f6dcade5c83aaed162b7ddd44ff5effef76b6f1a
>>>>>>> 64a51324a7dfc5dd333ef4aa8363875f194e27a3
}
