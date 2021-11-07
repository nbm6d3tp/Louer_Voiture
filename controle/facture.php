<?php

function louer(){ //si pas de date fin
    $idv=isset($_GET['idv'])?$_GET['idv']:'';
    $dateD=isset($_POST['dateD'])?$_POST['dateD']:'';
    $dateF=isset($_POST['dateF'])?$_POST['dateF']:'';
    $msg='';

    $arrdateD=explode("-",$dateD);
    $arrdateF=explode("-",$dateF);

    $timestampD= mktime(0,0,0,$arrdateD[1],$arrdateD[2],$arrdateD[0]);
    $timestampF= mktime(23,59,59,$arrdateF[1],$arrdateF[2],$arrdateF[0]);

    if($timestampD<time()){
        $msg="Date de debut doit etre superieur que date d'aujourd'hui";
        require ("./vue/voiture/entreprise/erreur_date.tpl") ;
    }

    else{
        if($timestampD>$timestampF){
            $msg="Date de debut doit etre inferieur que date de fin";
            require ("./vue/voiture/entreprise/erreur_date.tpl") ;
        }
        else{
            $voiture=array();
            $nbjours=(int)round(($timestampF-$timestampD)/86400);
            $prix=$nbjours*50;
            require_once('./modele/voiture_bd.php');
            afficher_v($idv,$voiture);
            require ("./vue/voiture/entreprise/confirmer.tpl") ;
        }
    }

}
    
function confirmer(){
    $ide=$_SESSION['profil']['id'];
    $idv=$_GET['idv'];
    $dateD=date("Y-m-d H:i:s",$_GET['dateD']);
    $dateF=date("Y-m-d H:i:s",$_GET['dateF']);
    $valeur=$_GET['valeur'];

    require_once('./modele/facture_bd.php');

    if(confirmer_bd($ide,$idv,$dateD,$dateF,$valeur)){
        $msg="Succes de louer. Merci beaucoup pour votre confiance!"; 
        require ("./vue/voiture/entreprise/louer_resultat.tpl") ;
    }
    else{
        $msg="Echec de louer"; 
        require ("./vue/voiture/entreprise/louer_resultat.tpl") ;
    }
}

?>