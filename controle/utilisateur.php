<?php 

//controleur contenant les fonctionalités qui concernent à l'utilisateur (identification, inscription, afficher l'accueil)

function ident_l() { //fonction ident pour le Loueur
	$pseudo=  isset($_POST['pseudo'])?($_POST['pseudo']):'';
	$mdp=  isset($_POST['mdp'])?($_POST['mdp']):'';
	$msg='';
	$_SESSION['profil'] = array();

	if  (count($_POST)==0)
        require ("./vue/utilisateur/loueur/ident_l.tpl") ;
    else {
	    require_once ("./controle/utilisateur.php");
		if  (! verif_ident_l($pseudo,$mdp,$resultat)) {
			$msg ="erreur de saisie";
	        require ("./vue/utilisateur/loueur/ident_l.tpl") ;
		}
	    else { 
            unset($_SESSION['profil']);
			unset($_SESSION['role']);
			$_SESSION['profil']['nom'] = $resultat['nom'];
			$_SESSION['profil']['id'] = $resultat['id'];
			$_SESSION['role']="loueur";			
			$url = "index.php?controle=utilisateur&action=accueil_l";
			header ("Location:" . $url) ;
		}
    }	
}

function ident_e() { //fonction ident pour les Entreprises
	$pseudo=  isset($_POST['pseudo'])?($_POST['pseudo']):'';
	$mdp=  isset($_POST['mdp'])?($_POST['mdp']):'';
	$msg='';
	$_SESSION['profil'] = array();

	if  (count($_POST)==0)
        require ("./vue/utilisateur/entreprise/ident_e.tpl") ;
    else {
	    require_once ("./controle/utilisateur.php");
		if  (! verif_ident_e($pseudo,$mdp,$resultat)) {
			$msg ="erreur de saisie";
	        require ("./vue/utilisateur/entreprise/ident_e.tpl") ;
		}
	    else { 
            unset($_SESSION['profil']);
			unset($_SESSION['role']);
			$_SESSION['profil']['nom'] = $resultat['nom'];
			$_SESSION['profil']['id'] = $resultat['id'];
			$_SESSION['role']="entreprise";				
			$url = "index.php?controle=utilisateur&action=accueil_e";
			header ("Location:" . $url) ;
		}
    }	
}

function verif_ident_l($pseudo,$mdp,&$resultat) { //fonction verifier l'identification pour le Loueur
	require ('./modele/utilisateur_bd.php');
	return verif_ident_l_BD($pseudo,$mdp,$resultat);
}

function verif_ident_e($pseudo,$mdp,&$resultat) { //fonction verifier l'identification pour les entreprises
	require ('./modele/utilisateur_bd.php');
	return verif_ident_e_BD($pseudo,$mdp,$resultat);
}

function accueil_l() { //fonction affichier l'accueil pour le Loueur, à faire (Minh) *** 
	$nom = $_SESSION['profil']['nom'];
	require ("./vue/utilisateur/loueur/accueil_l.tpl");
}

function accueil_e() { //fonction affichier l'accueil pour les entreprises abonnés/non abonnés, à faire (Rémi) ***
	$nom = isset($_SESSION['profil']['nom'])?$_SESSION['profil']['nom']:'';

	$resultat=array();
    require_once('./modele/voiture_bd.php');
    if(!afficher_v_stock_bd($resultat)){
        require ("./vue/utilisateur/entreprise/accueil_e.tpl");
    }

    else{
        require ("./vue/utilisateur/entreprise/accueil_e.tpl");
    } 
}

function inscrire(){ //fonction d'inscription

	$nom=  isset($_POST['nom'])?($_POST['nom']):'';
	$pseudo= isset($_POST['pseudo'])?($_POST['pseudo']):'';
	$mdp=  isset($_POST['mdp'])?($_POST['mdp']):'';
    $mdp_cf= isset($_POST['mdp_cf'])?($_POST['mdp_cf']):'';
	$email= isset($_POST['email'])?($_POST['email']):'';
    $nomE= isset($_POST['nomE'])?($_POST['nomE']):'';
    $adresseE= isset($_POST['adresseE'])?($_POST['adresseE']):'';

	$ins=false;
	$msg='';
	$_SESSION['profil'] = array();


    if  ($nom==''||$pseudo==''||$mdp==''||$email==''||$mdp_cf==''||$nomE==''||$adresseE==''){
		require ("./vue/utilisateur/entreprise/inscrire.tpl") ;
	}
    else if($mdp!=$mdp_cf){
        $msg= "Les mots de passe ne correspondent pas";
        require ("./vue/utilisateur/entreprise/inscrire.tpl") ;
    }       
    else{
        require_once ('./modele/utilisateur_bd.php');
		if(existe($pseudo)){
			$msg='Compte deja existe';
			require ("./vue/utilisateur/entreprise/inscrire.tpl") ;
		}
		else{
			if(inscrire_bd($nom,$pseudo,$mdp,$email,$nomE,$adresseE,$resultat)){
				$msg="Succes d'inscription"; 
				$ins=true;
				setcookie('id',$resultat['id'],time()+3000); //creation de cookies
				unset($_SESSION['profil']);
				unset($_SESSION['role']);
				$_SESSION['profil']['nom'] = $resultat['nom'];
				$_SESSION['role']="entreprise";	
				require ("./vue/utilisateur/entreprise/inscrire.tpl") ;
			}
			else{
				$msg="Echec d'inscription"; 
				require ("./vue/utilisateur/entreprise/inscrire.tpl") ;
			}
		}
    
     }
    

}

function deconnecter(){ //fonction pour déconnecter
	session_destroy();
	ident_e();
}

function infos_et_confirmer(){
	$id=isset($_GET['voiture'])?$_GET['voiture']:'';

	$voiture=array();
    require_once('./modele/voiture_bd.php');
    if(!afficher_v($id,$voiture)){
        require ("./vue/voiture/entreprise/infos_et_confirmer.tpl") ;
    }

    else{
        require ("./vue/voiture/entreprise/infos_et_confirmer.tpl") ;
    } 

	
}

function if_non_ident(){
	require("./vue/voiture/entreprise/if_non_ident.tpl");
}

?>
