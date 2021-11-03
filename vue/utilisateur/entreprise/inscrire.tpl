<!-- La page d'inscription pour les entreprises non abonnés -->


<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Inscription</title>
</head>

<body>

<h3> Formulaire d'inscription </h3> 
<form action="index.php?controle=utilisateur&action=inscrire" method="post">

    <input 	name="nom" 	type="text" value= "<?php echo $nom;
											?>" required
					>      Nom      <br/>
    <input  name="pseudo"  type="text"  value= "<?php echo $pseudo;
											?>" required
					>  Pseudo    <br/> 
	<input 	name="mdp" 	type="password" value= "<?php echo $mdp;
											?>" required
					>      Password      <br/>

    <input 	name="mdp_cf" 	type="password" required
					>      Confirmation de password      <br/>             
	<input 	name="email" 	type="text" value= "<?php echo $email;
											?>"
					>      Email      <br/>
    <input 	name="nomE" 	type="text" value= "<?php echo $nomE;
											?>" required
					>      Nom d'entreprise      <br/>
    <input 	name="adresseE" 	type="text" value= "<?php echo $adresseE;
											?>" required
					>      Adresse d'entreprise      <br/>
	<input type= "submit"  value="soumettre">
	
</form>


	
	<div> <?php echo $msg; ?> </div>
	
	<div> <?php 
		if($ins){
            $nom = $_SESSION['profil']['nom'];
			echo "<a href='index.php?controle=utilisateur&action=accueil_e_a' title='connexion'>
				Connexion </a>";
		}
	 ?> </div>
</body></html>
