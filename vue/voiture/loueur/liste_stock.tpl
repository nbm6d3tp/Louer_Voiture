<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Inscription</title>
</head>

<body>
	
    <?php
        foreach($resultat as $voiture){
            echo "<b> Voiture: ".$voiture['type']."</b>";    
            echo '<br>';
            echo "Nombre en stock: ".$voiture['nb'];
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
            echo '<br>';
            echo '<br>';
        }
    ?>


    <div> <?php echo $msg; ?> </div>
	
</body></html>