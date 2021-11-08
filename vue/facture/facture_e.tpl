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
            <td>'.$facture['type'].'</td>
            <td>'.$facture['caract'].'</td>
            <td>'.$facture['dateD'].'</td>
            <td>'.$facture['dateF'].'</td>
            <td>'.$facture['valeur'].'</td>
            <td>'.$facture['etatR'].'</td>
            </tr>
        ';
    }
    echo '</table>';
    echo '<br>';
    echo $msg;
    echo '<br>';
    echo 'Valeur total à payer de cette entreprise: '.$somme;
    echo '<br>';
?>
<a href="index.php?controle=utilisateur&action=accueil_l">Retour a l'accueil</a>
</body></html>