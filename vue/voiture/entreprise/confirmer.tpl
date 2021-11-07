<!-- La page qui apparaît après que les entreprises abonnés ont sélectionné un certain véhicule sur le site 
d'accueil (cliquer sur le photo du véhicule par exemple), contient des informations plus détaillées sur le véhicule, 
permet aux entreprises de choisir une date de début et de fin de location, de confirmer la location -->


<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Inscription</title>
</head>

<body>
    <?php
        echo "<b> Voiture: ".$voiture['type']."</b>";
        echo '<br>';
        $caract=json_decode($voiture['caract'],true);
        $moteur=$caract['moteur'];
        $vitesse=$caract['vitesse'];
        $nbplaces=$caract['nbplaces']; 
        echo "Moteur: ".$moteur."; Vitesse: ".$vitesse."; Nombre de places: ".$nbplaces;
        echo '<br>';
        echo "Etat: ".$voiture['etatL'];
        echo '<br>';
        echo '<image src="vue/photos_voitures/'.$voiture['photo'].'" width="200" height="200">';
        echo '<br>';
        echo '<p>Louer cette voiture de '.$dateD.' à '.$dateF.' ('.$nbjours.' jours)</p>';
        echo '<br>';
        echo '<p>À payer totalement: '.$prix.'</p>';
    ?>
    <br>
    <a href="index.php?controle=facture&action=confirmer&idv=<?php echo $idv;?>&dateD=<?php echo $timestampD;?>&dateF=<?php echo $timestampF;?>&valeur=<?php echo $prix;?>">Confirmer</a>
    <a href="index.php?controle=utilisateur&action=infos_et_confirmer&voiture=<?php echo $idv;?>">Annuler</a>

    <div> <?php echo $msg; ?> </div>
</body></html>