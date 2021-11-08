<!-- La page d'accueil, affichée pour le Loueur, à faire (Minh) *** -->

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>accueil </title>
</head>

<body>


<h3> 	Bienvenue
				<?php 
					printf ('M. %s', $nom);
				?>
</h3>
<br>
<a href="index.php?controle=utilisateur&action=deconnecter">deconnexion</a>
<br>
<a href="index.php?controle=voiture&action=entrer">Entrer une nouvelle voiture</a>
<br>
<a href="index.php?controle=voiture&action=afficher_v_stock">Afficher les voitures en stock</a>
<br>
<a href="index.php?controle=voiture&action=liste_louer_l">Afficher les voitures en location</a>
<br>
<a href="index.php?controle=facture&action=calculer_facture">Calculer factures du mois courant</a>

</body></html>
