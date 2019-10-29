<?php
	
	function connBDD(){
		$server="localhost";
		$visiteur="root";
		$password="";
		$dbname="CoursSql";

		try
		{
			$conn=new PDO("mysql:host=$server;dbname=$dbname",$visiteur,$password);
			return $conn;
		}
		catch (Exception $e)
		{
			die("Erreur BDD : ".$e->getMessage());
		}
	}

	function getvisiteuroccupation(){
		$rep=connBDD()->query("SELECT * FROM visiteur INNER JOIN occupation ON visiteur.id = occupation.id_visiteur");
		return $rep;
	}

	function getvisiteurs(){
		$rep=connBDD()->query("SELECT * FROM visiteur");
		return $rep;
	}

	function getoccupations(){
		$rep=connBDD()->query("SELECT * FROM occupation");
		return $rep;
	}

	function getvisiteurByName($nom){
		$q=connBDD()->prepare("SELECT * FROM visiteur WHERE visiteur.lastname = :nom");
		$q->bindParam(":nom",$nom);
		$q->execute();
		return $q;
	}

	function getoccupationByName($nom){
		$q=connBDD()->prepare("SELECT * FROM occupation WHERE occupation.nom = :nom");
		$q->bindParam(":nom",$nom);
		$q->execute();
		return $q;
	}

	function visiteurExist($nom){
		$q=connBDD()->prepare("SELECT COUNT(*) FROM visiteur WHERE visiteur.lastname = :nom");
		$q->bindParam(":nom",$nom);
		$q->execute();		
		return $q;
	}

	function occupationExist($nom){
		$q=connBDD()->prepare("SELECT COUNT(*) FROM occupation WHERE occupation.nom = :nom");
		$q->bindParam(":nom",$nom);
		$q->execute();		
		return $q;
	}

	function Addvisiteur($firstname,$lastname,$age){
		$q=connBDD()->prepare("INSERT INTO visiteur (firstname,lastname,age) VALUES (:firstname,:lastname,:age)");
		$q->bindParam(":firstname",$firstname);
		$q->bindParam(":lastname",$lastname);
		$q->bindParam(":age",$age);
		$q->execute();		
		return $q;		
	}

	function Addoccupation($nom){
		$q=connBDD()->prepare("INSERT INTO occupation (nom,id_visiteur) VALUES (:nom,:id_visiteur)");
		$q->bindParam(":nom",$nom);
		$q->bindParam(":id_visiteur",$id_visiteur);
		$q->execute();
		return $q;		
	}

	function Updatevisiteur($firstname,$lastname,$age){
		$q=connBDD()->prepare("UPDATE visiteur SET (firstname,lastname,age) VALUES (:firstname,:lastname,:age)");
		$q->bindParam(":firstname",$firstname);
		$q->bindParam(":lastname",$lastname);
		$q->bindParam(":age",$age);
		$q->execute();		
		return $q;
	}

?>
