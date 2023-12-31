<?php
function connexion(){
	try
	{
		global $bdd;
		$bdd = new PDO('mysql:host=localhost;dbname=websiteprojet', 'root', '');

	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
}

function autoid(){
    global $bdd;

    $query = $bdd->query("SELECT MAX(id) AS max_id FROM client");
    $result = $query->fetch(PDO::FETCH_ASSOC);

  
    $id = $result['max_id'] + 1;

    return $id;
}
function autoidcontact(){
    global $bdd;

    $query = $bdd->query("SELECT MAX(idcont) AS max_id FROM contact");
    $result = $query->fetch(PDO::FETCH_ASSOC);

  
    $id = $result['max_id'] + 1;

    return $id;
}
function autoidproduit(){
    global $bdd;

    $query = $bdd->query("SELECT MAX(id_produit) AS max_id FROM produit");
    $result = $query->fetch(PDO::FETCH_ASSOC);

  
    $id = $result['max_id'] + 1;

    return $id;
}


?>