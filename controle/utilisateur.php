<?php 

function ident_l() {
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
			$_SESSION['role']="loueur";			
			$url = "index.php?controle=utilisateur&action=accueil_l";
			header ("Location:" . $url) ;
		}
    }	
}

function ident_e() {
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
			$_SESSION['role']="entreprise";				
			$url = "index.php?controle=utilisateur&action=accueil_e_a";
			header ("Location:" . $url) ;
		}
    }	
}

function verif_ident_l($pseudo,$mdp,&$resultat) {
	require ('./modele/utilisateur_bd.php');
	return verif_ident_l_BD($pseudo,$mdp,$resultat);
}

function verif_ident_e($pseudo,$mdp,&$resultat) {
	require ('./modele/utilisateur_bd.php');
	return verif_ident_e_BD($pseudo,$mdp,$resultat);
}

function accueil_l() {
	$nom = $_SESSION['profil']['nom'];
	require ("./vue/utilisateur/loueur/accueil_l.tpl");
}

function accueil_e_a() {
	$nom = $_SESSION['profil']['nom'];
	require ("./vue/utilisateur/entreprise/accueil_e_a.tpl");
}


function inscrire(){

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

function deconnecter(){
	session_destroy();
}

?>
