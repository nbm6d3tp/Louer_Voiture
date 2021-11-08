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
<a href="index.php?controle=utilisateur&action=accueil_e">Retour a l'accueil</a>
<br>
    <?php

        foreach($resultat as $cle => $voiture){
            if($_SESSION!=null){
                echo '<a href="index.php?controle=utilisateur&action=infos_et_confirmer&voiture='.$voiture['id'].'"><b> Voiture: '.$voiture["type"].'</b></a>';    
            }
            else{
                echo '<a href="index.php?controle=utilisateur&action=if_non_ident"><b> Voiture: '.$voiture["type"].'</b></a>';     
            }
            echo '<br>';
            $caract=json_decode($voiture['caract'],true);
            $moteur=$caract['moteur'];
            $vitesse=$caract['vitesse'];
            $nbplaces=$caract['nbplaces']; 
            echo "Moteur: ".$moteur."; Vitesse: ".$vitesse."; Nombre de places: ".$nbplaces;
            echo '<br>';
            echo '<br>';
            echo '<image src="vue/photos_voitures/'.$voiture['photo'].'" width="200" height="200">';
            echo '<br>';
            echo 'Date de debut: '.date("Y-m-d",strtotime($voiture['dateD']));
            echo '<br>';
            echo 'Date de fin: '.date("Y-m-d",strtotime($voiture['dateF']));
            echo '<br>';
            echo 'À régler: '.$voiture['valeur']; 
            echo '<br>';
            echo '<br>';
            echo '<br>';
        }
    
    ?>
    <br>
    <?php echo $msg;?>
	<br>
    <p>À régler total: <?php echo $somme ?></p>
</body></html>