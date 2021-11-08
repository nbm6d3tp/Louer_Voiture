<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Confirmer de louer</title>
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
        echo $msglouer;
        echo '<br>';
        echo '<p>À payer totalement: '.$prix.'</p>';
    ?>
    <br>
    <a href="index.php?controle=facture&action=confirmer&idv=<?php echo $idv;?>&dateD=<?php echo $timestampD;?>&dateF=<?php echo $timestampF;?>&valeur=<?php echo $prix;?>">Confirmer</a>
    <a href="index.php?controle=utilisateur&action=infos_et_confirmer&voiture=<?php echo $idv;?>">Annuler</a>

    <div> <?php echo $msg; ?> </div>
</body></html>