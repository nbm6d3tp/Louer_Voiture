<!-- La page contient la liste de tous les véhicules loués par un entreprise (c'est entreprise abonné qui utilise cette fonctionalité) -->


<!-- //connextion
//quand on clique sur un photo de voiture, un message sera affiché: "il faut connecter pour louer cette voiture" -->

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Inscription</title>
</head>

<body>
	
<h1>Liste des voitures loues </h1>
<br>
<a href="index.php?controle=utilisateur&action=accueil_l">Retour a l'accueil</a>
<br>
    <?php

        foreach($resultat as $cle => $facture){
            echo '<b> Voiture: '.$facture["type"].'</b>'; 
            echo '<br>';    
            echo "Entreprise qui loue: ".$facture['nomE'];
            echo '<br>';
            $caract=json_decode($facture['caract'],true);
            $moteur=$caract['moteur'];
            $vitesse=$caract['vitesse'];
            $nbplaces=$caract['nbplaces']; 
            echo "Moteur: ".$moteur."; Vitesse: ".$vitesse."; Nombre de places: ".$nbplaces;
            echo '<br>';
            echo '<br>';
            echo '<image src="vue/photos_voitures/'.$facture['photo'].'" width="200" height="200">';
            echo '<br>';
            echo 'Date de debut: '.date("Y-m-d",strtotime($facture['dateD']));
            echo '<br>';
            echo 'Date de fin: '.date("Y-m-d",strtotime($facture['dateF']));
            echo '<br>';
            echo 'À régler: '.$facture['valeur']; 
            echo '<br>';
            echo '<br>';
            echo '<br>';
        }
    
    ?>
	
</body></html>