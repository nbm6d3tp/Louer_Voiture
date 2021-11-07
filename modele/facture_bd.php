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

				if($bool1) return true;
				else return false;
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

?>