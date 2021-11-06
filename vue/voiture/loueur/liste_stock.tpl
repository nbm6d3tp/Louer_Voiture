<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Inscription</title>
</head>

<body>
	<a href="index.php?controle=utilisateur&action=accueil_l">Retour a l'accueil</a>
    <br>
    <?php
        foreach($resultat as $cle => $voiture){
            echo "<b> Voiture: ".$voiture['type']."</b>";    
            echo '<br>';
            echo "Nombre en stock: ".$voiture['nb'];
            echo '<br>';
            echo "Changer nombre en stock: ".'
            
            <form action="index.php?controle=voiture&action=changer_stock&id='.$voiture['id'].'" method="post">
                <input name="nb" type="text" style="width:50px">
                <input type= "submit"  value="soumettre">
            </form>

            ';
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


    <!-- <div> <?php echo $msg; ?> </div> -->
	
</body></html>