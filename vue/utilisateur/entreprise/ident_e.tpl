<!-- La page d'identification pour les entreprises abonné -->

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>identification</title>
</head>

<body>

<h3> Formulaire d'authentification pour les entreprises </h3> 
<form action="index.php?controle=utilisateur&action=ident_e" method="post">

    <input 	name="pseudo" 	type="text" value= "<?php echo $pseudo;
											?>"
					>      Pseudo      <br/>
    <input  name="mdp"  type="Password"  value= "<?php echo $mdp;
											?>"
					>  Password    <br/> 
					
    <input type= "submit"  value="soumettre">
	
</form>

<div>
    <a href="index.php?controle=utilisateur&action=ident_l">Identification comme Loueur</a>
    <br>
    <a href="index.php?controle=utilisateur&action=accueil_e">Retour a l'accuel</a>
</div>

<div> 
	<?php echo $msg;
	?>
</div> 

</body></html>
