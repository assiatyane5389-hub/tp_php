<?php
// Auteur : Assia Tyane | Objectif : valider puis enregistrer les notes | Date : 18/10/2026
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/fonctions_inc.php';
$titrePage='Résultat de la saisie'; include __DIR__ . '/includes/entete_inc.php'; include __DIR__ . '/includes/menu_inc.php';
$erreurs=[]; $nom=''; $noteInfo=''; $noteMath='';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $erreurs[]='Cette page reçoit les données du formulaire POST. Ouvrez saisie.html pour commencer.';
} else {
    foreach (['nom','note_info','note_math'] as $champ) {
        if (!isset($_POST[$champ]) || !is_string($_POST[$champ])) $erreurs[]='Le champ '.h($champ).' est absent ou invalide.';
        elseif (empty($_POST[$champ]) && $_POST[$champ] !== '0') $erreurs[]='Le champ '.h($champ).' est obligatoire.';
    }
    if ($erreurs===[]) {
        $nom=trim($_POST['nom']); $noteInfo=trim($_POST['note_info']); $noteMath=trim($_POST['note_math']);
        if ($nom==='') $erreurs[]='Le nom ne peut pas être vide.';
        foreach (['Note informatique'=>$noteInfo,'Note mathématique'=>$noteMath] as $libelle=>$valeur) {
            if (!is_numeric($valeur)) $erreurs[]=$libelle.' doit être numérique.';
            elseif ((float)$valeur<NOTE_MIN || (float)$valeur>NOTE_MAX) $erreurs[]=$libelle.' doit être comprise entre '.NOTE_MIN.' et '.NOTE_MAX.'.';
        }
    }
    if ($erreurs===[]) {
        $chemin=__DIR__.'/data/notes.csv';
        if (!is_dir(dirname($chemin))) mkdir(dirname($chemin),0775,true);
        $f=fopen($chemin,'a');
        if ($f===false) $erreurs[]='Impossible d’ouvrir le fichier CSV en écriture.';
        else {
            if (filesize($chemin)===0) fputcsv($f,['nom','note_info','note_math'],';','"','');
            $ok=fputcsv($f,[$nom,$noteInfo,$noteMath],';','"',''); fclose($f);
            if ($ok===false) $erreurs[]='Échec de l’écriture dans le fichier CSV.';
        }
    }
}
if ($erreurs) { echo '<h2 class="erreur">Saisie non enregistrée</h2><ul class="erreur">'; foreach ($erreurs as $e) echo '<li>'.h($e).'</li>'; echo '</ul>'; }
else { $moyenne=((float)$noteInfo+(float)$noteMath)/2; echo '<h2 class="ok">Saisie enregistrée</h2><p>Nom : '.h($nom).'</p><p>Informatique : '.h($noteInfo).'</p><p>Mathématiques : '.h($noteMath).'</p><p>Moyenne : '.h(number_format($moyenne,2,',',' ')).' — '.h(mention($moyenne)).'</p>'; }
echo '<p><a href="saisie.html">Saisir un autre apprenant</a> · <a href="liste.php">Consulter la liste</a></p>';
?>
<p class="boite">POST évite d’inscrire le mot de passe dans l’URL comme GET, mais ne chiffre pas le contenu : HTTPS reste nécessaire. <code>$_REQUEST</code> peut regrouper des valeurs de GET, POST et COOKIE selon la configuration PHP.</p>
<?php include __DIR__ . '/includes/pied_inc.php'; ?>

