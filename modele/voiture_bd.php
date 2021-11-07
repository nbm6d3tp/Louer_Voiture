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


function afficher_v_stock_bd(&$resultat){
	require ("./modele/connect.php");
	$sql="SELECT * FROM `vehicule`";

try {
		$commande = $pdo->prepare($sql);
		$bool=$commande->execute();

		if ($bool) $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
		if ($resultat== null) return false; 
		else return true;
	}
	
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function afficher_v($id,&$resultat){
	require ("./modele/connect.php");
	$sql="SELECT * FROM `vehicule` where id=:id";

	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id', $id);
		$bool=$commande->execute();

		if ($bool) $resultat = $commande->fetch(PDO::FETCH_ASSOC); //tableau d'enregistrements
		if ($resultat== null) return false; 
		else return true;
	}
	
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function changer_stock_bd($nb,$id){
	require ("./modele/connect.php");
	$sql="UPDATE `vehicule` SET nb=:nb where id=:id";
	
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':id', $id);
		$commande->bindParam(':nb', $nb);
		$bool=$commande->execute();

		if ($bool) return true; 
		else return false;
	}
	
	catch (PDOException $e) {
		echo utf8_encode("Echec de changer : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function liste_louer_bd($ide, &$resultat){
	require ("./modele/connect.php");
	$sql="SELECT vehicule.*, facture.dateD,facture.dateF,facture.valeur FROM facture INNER JOIN vehicule ON vehicule.id=facture.idv WHERE facture.ide=:ide";

try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':ide', $ide);
		$bool=$commande->execute();

		if ($bool) $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
		if ($resultat== null) return false; 
		else return true;
	}
	
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}
?>