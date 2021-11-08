<?php

function louer(){ //si pas de date fin
    $idv=isset($_GET['idv'])?$_GET['idv']:'';
    $dateD=isset($_POST['dateD'])?$_POST['dateD']:'';
    $dateF=isset($_POST['dateF'])?$_POST['dateF']:'';
    $msg='';

    $arrdateD=explode("-",$dateD);
    $timestampD= mktime(0,0,0,$arrdateD[1],$arrdateD[2],$arrdateD[0]);


    if($dateF!=""){
        $arrdateF=explode("-",$dateF);
        $timestampF= mktime(23,59,59,$arrdateF[1],$arrdateF[2],$arrdateF[0]);
    }

    else{
        $timestampF=$timestampD+30*86400-1;
        $dateF=date("Y-m-d",$timestampF);
    }


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
            $nbmois='';
            $nbjours=(int)round(($timestampF-$timestampD)/86400);

            $msglouer='Louer cette voiture de '.$dateD.' à '.$dateF.' (';
            if($nbjours>=30){
                $nbmois=(int)floor($nbjours/30);
                $prix=$nbjours%30*50+$nbmois*1000;
                $msglouer.=$nbmois.' mois et '.($nbjours%30).' jours)';
            }
            else{
                $prix=$nbjours*50;
                $msglouer.=$nbjours.' jours)';
            }
            
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


function calculer_facture(){
    $somme=0;
    $resultat=array();
    require_once('./modele/facture_bd.php');

    if(calculer_facture_bd($somme)&&liste_facture($resultat)){
        require ("./vue/facture/facture_total.tpl") ;
    }
    else{
        require ("./vue/facture/facture_total.tpl") ;
    }
}


function liste_facture_e(){
    $ide=$_GET['ide'];
    $somme=0;
    $resultat=array();
    $msg='';
    require_once('./modele/facture_bd.php');
    if(calculer_facture_e_bd($ide,$somme,$reduction)&&liste_facture_e_bd($ide,$resultat)){
        if($reduction){
            $msg='Cette entreprise profit une reduction de 10%';
        }
        require ("./vue/facture/facture_e.tpl") ;
    }
    else{
        require ("./vue/facture/facture_e.tpl") ;
    }
}
?>