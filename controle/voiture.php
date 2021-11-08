<?php

function entrer(){
    $arr_caract = array('moteur' => isset($_POST['moteur'])?($_POST['moteur']):'', 
                 'vitesse' => isset($_POST['vitesse'])?($_POST['vitesse']):'', 
                 'nbplaces' => isset($_POST['nbplaces'])?($_POST['nbplaces']):''
                );

    $type= isset($_POST['type'])?($_POST['type']):'';
	$nb= isset($_POST['nb'])?(intval($_POST['nb'])):'';
    $caract= json_encode($arr_caract);
    $photo= isset($_FILES['photo']['name'])?$_FILES['photo']['name']:'';
	$msg='';

    if(count($_POST)==0){
        require ("./vue/voiture/loueur/entrer_v.tpl") ;
    }
    else {
        if($nb<=0){
            $msg='Nombre de voitures invalide';
            require ("./vue/voiture/loueur/entrer_v.tpl") ;
        }
    
        else{
            require_once('./modele/voiture_bd.php');
            if(existe($type,$caract)){
                $msg='Voiture deja existe';
                require ("./vue/voiture/loueur/entrer_v.tpl") ;
            }
    
            else{
                if(entrer_bd($type,$nb,$caract,$photo)){
                    $msg="Succes d'entree"; 
                    move_uploaded_file($_FILES['photo']['tmp_name'],"vue/photos_voitures/".$_FILES['photo']['name']);
                    require ("./vue/voiture/loueur/entrer_v.tpl") ;
                }
                else{
                    $msg="Echec d'entree"; 
                    require ("./vue/voiture/loueur/entrer_v.tpl") ;
                }
            }
        }
    }
    
    
}


function afficher_v_stock(){
    $resultat=array();
    require_once('./modele/voiture_bd.php');
    if(!afficher_v_stock_bd($resultat)){
        require ("./vue/voiture/loueur/liste_stock.tpl") ;
    }

    else{
        require ("./vue/voiture/loueur/liste_stock.tpl") ;
    }
}

function changer_stock(){
    $id=$_GET['id'];
    $nb= isset($_POST['nb'])?(intval($_POST['nb'])):'';

    require_once('./modele/voiture_bd.php');
    if(!changer_stock_bd($nb,$id)){
        $url = "index.php?controle=voiture&action=afficher_v_stock";
		header ("Location:" . $url) ;
    }

    else{
        $url = "index.php?controle=voiture&action=afficher_v_stock";
		header ("Location:" . $url) ;
    }
}
  
function liste_louer(){
    $resultat=array();
    $ide=$_SESSION['profil']['id'];
    $somme=0;
    $msg='';
    require_once('./modele/facture_bd.php');
    require_once('./modele/voiture_bd.php');
    if(liste_louer_bd($ide, $resultat)&&calculer_facture_e_bd($ide,$somme,$reduction)){
        if($reduction){
            $msg='Vous avez une reduction de 10%';
        }
        require ("./vue/voiture/entreprise/liste_louer_e.tpl") ;
    }
    else{
        require ("./vue/voiture/entreprise/liste_louer_e.tpl") ;
    }
}

function liste_louer_l(){
    $resultat=array();
    require_once('./modele/voiture_bd.php');
    if(!liste_louer_l_bd($resultat)){
        require ("./vue/voiture/loueur/liste_louer_l.tpl") ;
    }
    else{
        require ("./vue/voiture/loueur/liste_louer_l.tpl") ;
    }}
?>