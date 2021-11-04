<?php

function existe($typeV,$caract){

    require ("./modele/connect.php");
	$sql="SELECT * FROM `vehicule`  where type=:typeV AND caract=:caract";
	
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':typeV', $typeV);
        $commande->bindParam(':caract', $caract);
		$commande->execute();
		$bool=$commande->fetch(PDO::FETCH_ASSOC);
		if($bool!=null)return true;
		else return false;
	}
	
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}

}


function entrer_bd($typeV,$nb,$caract,$photo){
    require ("./modele/connect.php");
    $sql='INSERT INTO vehicule(type, nb, caract, photo,etatL) values (:typeV, :nb, :caract, :photo, "disponible")';

    try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':typeV', $typeV);
		$commande->bindParam(':nb', $nb);
		$commande->bindParam(':caract', $caract);
		$commande->bindParam(':photo', $photo);
		$bool=$commande->execute();

		if ($bool) return true; 
		else return false;
		}
	
	catch (PDOException $e) {
		echo utf8_encode("Echec d'entree : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}

}


?>