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
    ?>

    <form action="index.php?controle=voiture&action=entrer" method="post">


    </form>
	
</body></html>