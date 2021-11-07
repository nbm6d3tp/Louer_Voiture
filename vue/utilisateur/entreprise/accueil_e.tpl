<!-- //connextion
//quand on clique sur un photo de voiture, un message sera affiché: "il faut connecter pour louer cette voiture" -->

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Inscription</title>
</head>

<body>
	
    <?php
        if(isset($_SESSION['profil'])&&$_SESSION['profil']!=null){
            echo '<h3> 	Bienvenue M.'.$nom.'</h3>';
            echo '<br>';
            echo '<a href="index.php?controle=utilisateur&action=deconnecter">deconnexion</a>';
            echo '<br>';
            echo '<a href="index.php?controle=voiture&action=liste_louer">Liste de voitures loues</a>';
            echo '<br>';
        }
        else{
            echo '<a href="index.php?controle=utilisateur&action=ident_e">Connexion</a>';
            echo '<br>';
        }

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
            echo "Etat: ".$voiture['etatL'];
            echo '<br>';
            echo '<image src="vue/photos_voitures/'.$voiture['photo'].'" width="200" height="200">';
            echo '<br>';
            echo '<br>';
            echo '<br>';
        }
    ?>
	
</body></html>