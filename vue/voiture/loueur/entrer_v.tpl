<!-- La page contenant la formulaire qui permet un loueur entrer une nouveau type de véhicule (l'ajouter à la bbd)  -->


<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Entreer une voiture</title>
</head>

<body>

<h3> Formulaire d'entrer nouvelles voitures </h3> 
<form action="index.php?controle=voiture&action=entrer" method="post" enctype="multipart/form-data">

    <input 	name="type" 	type="text" required
					>      Type de voiture      <br/>
    <input  name="nb"  type="text" required
					>  Quantité    <br/> 
	<input 	name="moteur" 	type="text" required
					>      Moteur      <br/>

    <input 	name="vitesse" 	type="text" required
                    >      Vitesse      <br/>             
	<input 	name="nbplaces" 	type="text" required
					>      Nombre de places      <br/>
    <input name="photo" type="file" required >
	<input type= "submit"  value="soumettre">
	
</form>
	
<div> <?php echo $msg; ?> </div>
<br>
<a href="index.php?controle=utilisateur&action=accueil_l">Retour a l'accueil</a>
	
</body></html>
