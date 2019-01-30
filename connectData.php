<?php
		/* On Récupére le contenu du fichier .json */
		$contenu_fichier_json = file_get_contents('databaseConnect.json');
		/* Les données json sont récupérées sous forme de tableau (true) */
		$dbInfos = json_decode($contenu_fichier_json, true);
		try{
			$bdd = new PDO('mysql:host=' . $dbInfos['hostname'] . ';dbname=' . $dbInfos['dbname'], $dbInfos['dbuser'], $dbInfos['dbpassword']);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		$bdd->exec("SET NAMES utf8");
			
		}
		catch (Exception $e) {
			die ('Erreur : ' . $e->getMessage());
		}

?>