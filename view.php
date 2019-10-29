<?php

	function render_all($res){
		while($row=$res->fetch()){
		echo "<p style='border:2px black solid;padding:5px; border-radius:10px; box-shadow:5px 5px 5px black;text-align:center;'>";
		print_r($row);
		echo "<br/>";
		echo "</p>";
		}
	}
?>