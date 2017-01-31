<?php

class musee extends SQLpdo{

	function __construct(){
		 parent::__construct();
	}
	
	/**
     * retourne un musée random, contient un attribut optionnel 
     * 
	 * @param string 	$v		nom de la région -- optionnel 
	 *
	 * @return array  	retourne un tableau contenant les colonnes de la table
     * 
     * @access public
     * 
     */

	function myRandom($v = null){
		$array = null;
		$req = "";
		$val = null;
		if(!is_null($v)){
			$req = "WHERE nom_region_new LIKE :nom_region_new";
			$val = array(":nom_region_new" => "".$v."");
		}
		
		$sql="SELECT * FROM MUSEE ".$req." ORDER BY rand() LIMIT 1";
		$data = $this->fetch($sql, $val);

		return $data;
	}
	
	/**
     * retourne un musée grace à son ID
     * 
	 * @param string 	$id		ID du musée
	 *
	 *
	 * @return array  	retourne un tableau contenant les colonnes de la table
	 *
	 * 
	 * @access public
     * 
     */
	function GetById($id){
		 $sql = "SELECT * FROM MUSEE WHERE id=:id";

		 $data = $this->fetch($sql, array(':id' => $id));// à changer

    	 return $data;
    }

	/**
     * Affiche les musées favoris que l'utilisateur à like
     * 
	 * @param string 	$id		ID de l'utilisateur
	 *
	 *
	 * @return array  	retourne un double tableau contenant les colonnes de la table
	 *
	 * @access public
     * 
     */
	function museeFavoris($id){
		 $sql="SELECT * FROM MUSEE m LEFT JOIN MUSEE_FAV mf ON m.ID = mf.id_musee WHERE id_user=:id ORDER BY mf.id";
		 $data = $this->fetchAll($sql, array(':id' => $id));


		return $data;
	}

	/**
     * Vérifie si l'utilisateur déjà like le musée
     * 
	 * @param string 	$id		ID du musée
	 * @param string 	$user	ID de l'utilisateur
	 *
	 *
	 * @return array  	retourne un tableau contenant les colonnes de la table
	 *
	 * @access public
     * 
     */
	function userFavExist($id, $user){
		 $sql="SELECT * FROM MUSEE_FAV WHERE id_musee = :id AND id_user=".$user;
		 $data = $this->fetch($sql, array(':id'=>$id));

		return $data;
	}

	/**
     * Insert un musée like par l'utilisateur
     * 
	 * @param string 	$id		ID du musée
	 * @param string 	$user	ID de l'utilisateur
	 *
	 * @access public
     * 
     */
	function like($id, $user){
		$sql = "INSERT INTO MUSEE_FAV (id_user, id_musee) VALUES(:user, :id)";
		$sth = $this->insert($sql, array(':id'=>$id,':user'=>$user));

	}

	/**
     * Supprime un musée like par l'utilisateur
     * 
	 * @param string 	$id		ID du musée
	 * @param string 	$user	ID de l'utilisateur
	 *
	 * @access public
     * 
     */
	function dislike($id, $user){
		$sql = "DELETE FROM MUSEE_FAV WHERE id_user = '".$user."' AND id_musee = '".$id."'";
		$sth = $this->insert($sql);
	}

}



?>
