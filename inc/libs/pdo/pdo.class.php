<?php

class SQLpdo {
	function __construct($db=false, $login=false, $pass = false, $adress=false){
		$config['login']=($login) ? $login :DB_USER;
		$config['mdp']= ($pass) ? $pass : DB_PASS;
		$config['adress']=($adress) ? $adress :DB_HOST;
		$config['db']=($db) ? $db :DB_DATA;


		try {
		    $this->db = new PDO('mysql:dbname='.$config['db'].';host='.$config['adress'].';charset=utf8', $config['login'], $config['mdp']);
		} catch (PDOException $e) {
		    echo 'Connexion échouée : ' . $e->getMessage();
		}

	}

	/**
     * Permet de récupérer une liste de donnée
     * 
	 * @param string 	$sql			requête 
	 * @param array 	$execute		tableau contenant les clés et les valeurs devant être executé
     * 
	 * @return array 	retourne un tableau double contenant les données récupérés
     * 
     * @access public
     * 
     */
	function fetchAll($sql,$execute=null){
		$sth = $this->db->prepare($sql);//prepare SQL request
	    $sth->execute($execute);//execute la requette sql
	    return $sth->fetchAll(PDO::FETCH_ASSOC);// recupère toutes les données
	}

	/**
     * Permet d'insérer en base de données
     * 
	 * @param string 	$sql			requête 
	 * @param array 	$execute		tableau contenant les clés et les valeurs devant être executé
     * 
	 * @return array 	retourne l'ID de la dernière donnée enregistré 
     * 
     * @access public
     * 
     */
	function insert($sql, $execute=null){
		$sth = $this->db->prepare($sql);//prepare SQL request
	    $sth->execute($execute);//execute la requette sql
	    return  $this->db->lastInsertId();// recupère toutes les données
	}

	/**
     * Permet de mettre à jour une ligne de la table en base de données
     * 
	 * @param string 	$sql			requête 
	 * @param array 	$execute		tableau contenant les clés et les valeurs devant être executé
     * 
	 * @return array 	retourne le statut de la requête
     * 
     * @access public
     * 
     */
	function update($sql, $execute=null){
		$sth = $this->db->prepare($sql);//prepare SQL request
	    return $sth->execute($execute);//execute la requette sql
	}


	/**
     * Permet de récupérer une liste de donnée
     * 
	 * @param string 	$sql			requête 
	 * @param array 	$execute		tableau contenant les clés et les valeurs devant être executé
     * 
	 * @return array 	retourne un tableau contenant les données récupérés
     * 
     * @access public
     * 
     */
	function fetch($sql,$execute=null){
		$sth = $this->db->prepare($sql);//prepare SQL request
	    $sth->execute($execute);//execute la requette sql
	    return $sth->fetch(PDO::FETCH_ASSOC);// recupère toutes les données
	}
}
