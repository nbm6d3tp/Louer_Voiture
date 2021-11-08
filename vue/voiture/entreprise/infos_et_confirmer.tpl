<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Infos detail</title>
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

        if($voiture['etatL']=="disponible"){
          echo '<form action="index.php?controle=facture&action=louer&idv='.$voiture['id'].'" method="post">
          <input name="dateD" type="date" required> Date de debut <br/> 
          <input name="dateF" type="date"> Date de fin <br/> 
          <input type= "submit"  value="Louer">
        </form>';
        }
    
	

    ?>
</body></html>