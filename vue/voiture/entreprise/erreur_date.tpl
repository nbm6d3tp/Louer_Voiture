<!-- La page qui apparaît après que les entreprises abonnés ont sélectionné un certain véhicule sur le site 
d'accueil (cliquer sur le photo du véhicule par exemple), contient des informations plus détaillées sur le véhicule, 
permet aux entreprises de choisir une date de début et de fin de location, de confirmer la location -->


<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Date erreur</title>
</head>

<body>
	
    <div> <?php echo $msg; ?> </div>
    <br>
    <a href="index.php?controle=utilisateur&action=infos_et_confirmer&voiture=<?php echo $idv;?>">Retour</a>

</body></html>