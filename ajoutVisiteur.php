<?php
	require 'model.php';
	require 'view.php';

// renomme en visiteurController.php

	// fonction createVisiteur($ .. )

	render_all(Addvisiteur($_GET["firstname"], $_GET["lastname"], $_GET["age"]));

	header('Location: index.php');
	// }

	// function showVisiteur($id){
	// GetVISITEUR
	// appel vue : header
	//}

?>