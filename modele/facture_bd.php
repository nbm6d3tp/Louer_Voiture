<?php

function confirmer_bd($ide,$idv,$dateD,$dateF,$valeur){
    require ("./modele/connect.php");
    $sql='INSERT INTO facture(ide, idv, dateD, dateF,valeur,etatR) values (:ide, :idv, :dateD, :dateF, :valeur,0)';

    try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':ide', $ide);
		$commande->bindParam(':idv', $idv);
		$commande->bindParam(':dateD', $dateD);
		$commande->bindParam(':dateF', $dateF);
        $commande->bindParam(':valeur', $valeur);
		$bool=$commande->execute();

		if ($bool){
			$sql='UPDATE vehicule SET nb=nb-1 where id=:id';

			try{
				$commande = $pdo->prepare($sql);
				$commande->bindParam(':id', $idv);
				$bool1=$commande->execute();

				if($bool1){
					require ("./modele/voiture_bd.php");
					refresh();
					return true;
				} 
				else{
					return false;
				} 
			}

			catch (PDOException $e) {
				echo utf8_encode("Echec de update : " . $e->getMessage() . "\n");
				die(); // On arrête tout.
			}
		} 
		else return false;
	}
	
	catch (PDOException $e) {
		echo utf8_encode("Echec d'entree : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function calculer_facture_bd(&$somme){
	require ("./modele/connect.php");
    $sql='SELECT SUM(valeur) FROM facture where etatR=0 and MONTH(dateD)=month(now())';

    try {
		$commande = $pdo->prepare($sql);
		$bool=$commande->execute();
		$resultat=array();
		if ($bool) $resultat = $commande->fetch(PDO::FETCH_ASSOC); //tableau d'enregistrements
		if ($resultat== null){
			return false; 
		} 
		else{
			$somme=$resultat['SUM(valeur)'];
			return true;
		} 
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function liste_facture(&$resultat){

	require ("./modele/connect.php");
    $sql='SELECT * FROM facture';

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

function liste_facture_e_bd($ide,&$resultat){

	require ("./modele/connect.php");
    $sql='SELECT facture.id,vehicule.type,vehicule.caract,facture.dateD,facture.dateF, facture.valeur,facture.etatR FROM vehicule INNER JOIN facture on vehicule.id=facture.idv where facture.ide=:ide';

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

function calculer_facture_e_bd($ide,&$somme,&$reduction=false){
	require ("./modele/connect.php");
    $sql='SELECT SUM(valeur) FROM facture where etatR=0 and ide=:ide and MONTH(dateD)=month(now())';

    try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':ide', $ide);
		$bool=$commande->execute();
		$resultat=array();
		if ($bool) $resultat = $commande->fetch(PDO::FETCH_ASSOC); //tableau d'enregistrements
		if ($resultat== null){
			return false; 
		} 
		else{
			$somme=$resultat['SUM(valeur)'];
			count_louer($ide,$nb);
			if($nb>=10){
				$somme=$somme*90/100;
				$reduction=true;
			}
			return true;
		} 
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}

function count_louer($ide,&$nb){
	require ("./modele/connect.php");
	$sql='SELECT COUNT(id) FROM facture where etatR=0 and ide=:ide and MONTH(dateD)=month(now())';
	
	try {
		$commande = $pdo->prepare($sql);
		$commande->bindParam(':ide', $ide);
		$commande->execute();
		$resultat=$commande->fetch(PDO::FETCH_ASSOC); //tableau d'enregistrements
		$nb=$resultat['COUNT(id)'];
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
}
?>