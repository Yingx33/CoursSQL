<?php
	require 'model.php';
	require 'view.php';

	echo "<br/>";

	echo "<center style='font-size:28px;color:black;font-weight: bold;margin-bottom:20px;text-decoration:underline;'>Voici la liste de tous les visiteurs :<br /><br /></center>";
	render_all(getvisiteurs());

	?>

	<div style="border-top:2px black solid;">
		<form action="ajoutVisiteur.php" method="get"><p>Formulaire d'ajout de visiteur :</p>
			<label>Firstname</label> : <input type="text" name="firstname" required /><br />
			<label>Lastname</label> : <input type="text" name="lastname" required /><br />
			<label>Age</label> : <input type="int" name="age" required /><br />
			<input type="submit" value="Envoyer" />
		</form>
	</div>

	<div style="border-top:2px black solid;">
		<form action="index.php" method="get"><p>Formulaire de consultation de visiteur :</p>
			<label>Lastname</label> : <input type="text" name="nom" required /><br />
			<input type="submit" name="type" value="visiteur" />
		</form>
	</div>

	<div style="border-top:2px black solid;">
		<form action="index.php" method="get"><p>Formulaire de consultation des occupations :</p>
			<label for="nom">Nom de l'occupation</label><br />
       		<select name="nom" id="nom">
	            <option value="lecture">Lecture</option>
	            <option value="sport equipe">Sport équipe</option>
	            <option value="sport solo">Sport solo</option>
           	</select>
			<input type="submit" name="type" value="occupation" />
		</form>
	</div>

	<?php

	if($_GET["type"]=="visiteur"){
		if(visiteurExist($_GET["nom"])){
			render_all(getvisiteurByName($_GET["nom"]));
		} 
		else echo "Type et Nom incompatibles";
	}
	else if($_GET["type"]=="occupation"){
		if(occupationExist($_GET["nom"])){
			render_all(getoccupationByName($_GET["nom"]));
		} 
		else echo "Type et Nom incompatibles";
	}
	else echo "La table de la BDD n'a pas été identifié correctement ! <br/><br />";

?>