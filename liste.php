<?php
// Auteur : Assia Tyane | Objectif : lire le CSV et calculer les moyennes | Date : 18/10/2026
require_once __DIR__ . '/includes/fonctions_inc.php';
$titrePage='Liste des apprenants'; include __DIR__ . '/includes/entete_inc.php'; include __DIR__ . '/includes/menu_inc.php';
$chemin=__DIR__.'/data/notes.csv'; $enregistrements=[]; $erreur='';
if (!file_exists($chemin)) $erreur='Aucun fichier de notes pour le moment. Enregistrez un apprenant depuis saisie.html.';
else {
    $f=fopen($chemin,'r');
    if ($f===false) { echo '<p class="erreur">Impossible d’ouvrir le fichier de notes.</p>'; include __DIR__.'/includes/pied_inc.php'; exit; }
    $entete=fgetcsv($f,0,';','"','');
    while (($ligne=fgetcsv($f,0,';','"',''))!==false) {
        if (count($ligne)>=3) $enregistrements[]=['nom'=>$ligne[0],'info'=>(float)$ligne[1],'math'=>(float)$ligne[2]];
    }
    fclose($f);
}
if ($erreur!=='') echo '<p>'.h($erreur).'</p>';
elseif (!$enregistrements) echo '<p>Le fichier existe, mais ne contient encore aucun apprenant.</p>';
else {
    $sommeGenerale=0;
    echo '<table><tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>';
    foreach ($enregistrements as $e) { $m=($e['info']+$e['math'])/2; $sommeGenerale+=$m; echo '<tr><td>'.h($e['nom']).'</td><td>'.h($e['info']).'</td><td>'.h($e['math']).'</td><td>'.h(number_format($m,2,',',' ')).'</td><td>'.h(mention($m)).'</td></tr>'; }
    echo '</table><p>Moyenne générale de la classe : <strong>'.h(number_format($sommeGenerale/count($enregistrements),2,',',' ')).'</strong>.</p>';
}
?>
<h2>Lecture bas niveau avec fgets()</h2>
<p>fgets() lit une ligne texte ; explode(';', ...) coupe aux points-virgules, mais ne respecte pas les champs cités qui contiennent un point-virgule ou un guillemet.</p>
<?php
if (file_exists($chemin) && ($f=fopen($chemin,'r'))!==false) {
    echo '<pre>';
    while (!feof($f)) { $ligne=fgets($f); if ($ligne===false) break; echo h($ligne); $parties=explode(';',rtrim($ligne,"\r\n")); echo '  → '.h(json_encode($parties,JSON_UNESCAPED_UNICODE))."\n"; }
    echo '</pre>'; fclose($f);
}
?>
<p><strong>Comparaison :</strong> fgetcsv() gère correctement les champs entre guillemets et les séparateurs inclus ; fgets()+explode() est simple à comprendre, mais fragile dès que le CSV contient des champs cités ou des caractères spéciaux.</p>
<?php include __DIR__ . '/includes/pied_inc.php'; ?>

