<!-- La page d'identification pour le Loueur -->

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>identification</title>
</head>

<body>

<h3> Formulaire d'authentification pour le loueur </h3> 
<form action="index.php?controle=utilisateur&action=ident_l" method="post">

    <input 	name="pseudo" 	type="text" value= "<?php echo $pseudo;
											?>"
					>      Pseudo      <br/>
    <input  name="mdp"  type="Password"  value= "<?php echo $mdp;
											?>"
					>  Password    <br/> 
					
    <input type= "submit"  value="soumettre">
	
</form>

<div>
    <a href="index.php?controle=utilisateur&action=ident_e">Identification comme un Entreprise</a>
</div>


<div> 
	<?php echo $msg;
	?>
</div> 

</body></html>
