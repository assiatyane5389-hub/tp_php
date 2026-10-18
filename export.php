<?php
// Auteur : Assia Tyane | Objectif : exporter puis relire les résultats JSON | Date : 17/10/2026
require_once __DIR__ . '/includes/fonctions_inc.php';
$titrePage='Export JSON'; include __DIR__ . '/includes/entete_inc.php'; include __DIR__ . '/includes/menu_inc.php';
$csv=__DIR__.'/data/notes.csv'; $jsonPath=__DIR__.'/data/notes.json'; $resultats=[];
if (file_exists($csv) && ($f=fopen($csv,'r'))!==false) {
    fgetcsv($f,0,';','"','');
    while (($r=fgetcsv($f,0,';','"',''))!==false) if (count($r)>=3) $resultats[]=['nom'=>$r[0],'notes'=>['informatique'=>(float)$r[1],'mathematiques'=>(float)$r[2]],'moyenne'=>((float)$r[1]+(float)$r[2])/2];
    fclose($f);
}
$json=json_encode($resultats,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
if ($json===false || file_put_contents($jsonPath,$json)===false) echo '<p class="erreur">Échec de la création du fichier JSON.</p>';
else {
    $lu=file_get_contents($jsonPath); $decode=json_decode($lu,true);
    echo '<p>Le fichier <code>data/notes.json</code> a été écrit puis relu avec json_decode(..., true).</p><h2>Résultats relus</h2><pre>'.h(print_r($decode,true)).'</pre>';
    echo '<h2>Comparaison des formats</h2><p>Exemple json_encode() :</p><pre>'.h($json).'</pre><p>Exemple serialize() :</p><pre>'.h(serialize($resultats)).'</pre>';
}
?>
<p class="boite">JSON est directement exploitable par JavaScript (par exemple avec JSON.parse()). serialize() est un format propre à PHP.</p>
<?php include __DIR__ . '/includes/pied_inc.php'; ?>

