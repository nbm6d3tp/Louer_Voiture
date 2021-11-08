<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Inscription</title>
</head>

<body>
	
<?php
    echo '<table border="1">
        <tr>
            <th>id</th>
            <th>ide</th>
            <th>idv</th>
            <th>dateD</th>
            <th>dateF</th>
            <th>valeur</th>
            <th>etatR</th>
        </tr>';
    foreach($resultat as $facture){
        echo '<tr>
            <td>'.$facture['id'].'</td>
            <td><a href="index.php?controle=facture&action=liste_facture_e&ide='.$facture['ide'].'">'.$facture['ide'].'</a></td>
            <td>'.$facture['idv'].'</td>
            <td>'.$facture['dateD'].'</td>
            <td>'.$facture['dateF'].'</td>
            <td>'.$facture['valeur'].'</td>
            <td>'.$facture['etatR'].'</td>
            </tr>
        ';
    }
    echo '</table>';
    echo '<br>';
    echo 'Valeur total du mois courant est: '.$somme;
    echo '<br>';
?>
<a href="index.php?controle=utilisateur&action=accueil_l">Retour a l'accueil</a>
</body></html>