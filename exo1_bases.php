<?php
// Auteur : Assia Tyane | Objectif : pratiquer variables, constantes, types et chaînes | Date : 17/10/2026
require __DIR__ . '/config.php';
$titrePage = 'Partie 1 — Bases PHP';
include __DIR__ . '/includes/entete_inc.php'; include __DIR__ . '/includes/menu_inc.php';
// Commentaire sur une ligne avec deux barres.
# Commentaire sur une ligne avec le caractère dièse.
/* Commentaire sur plusieurs lignes : ce script regroupe les exercices 1.1 à 1.5. */
echo 'Hello PHP';
?>
<h2>Exercice 1.1 — Variables</h2>
<?php
/* Valides : $x, $_x, $Prix_HT et $état (PHP accepte les lettres UTF-8 dans les noms).
   Invalides : $2x commence par un chiffre ; $x-y est interprété comme une soustraction ;
   $prix ht contient un espace et ne forme pas un nom de variable valide. */
$x = 1; $_x = 2; $Prix_HT = 3; $état = 'valide';
$a = 'minuscule'; $A = 'majuscule';
echo '<p>Variables valides déclarées : $x, $_x, $Prix_HT, $état.</p>';
echo '<p>$a et $A sont distinctes : ' . h($a) . ' / ' . h($A) . '.</p>';
?>
<h2>Exercice 1.2 — Constantes</h2>
<p>Établissement : <?= h(ETABLISSEMENT) ?> · Note minimale : <?= NOTE_MIN ?> · Note maximale : <?= NOTE_MAX ?> · Seuil : <?= SEUIL ?>.</p>
<p>defined('SEUIL') : <?= defined('SEUIL') ? 'true' : 'false' ?> ; defined('INCONNUE') : <?= defined('INCONNUE') ? 'true' : 'false' ?>.</p>
<?php /* Une constante non définie déclenche un avertissement (et peut être interprétée comme une chaîne selon la version PHP). const est déclarée au niveau du code ; define() crée une constante à l'exécution et permet une déclaration conditionnelle. */ ?>
<h2>Exercice 1.3 — Calcul TTC</h2>
<?php
$prix_ht = 60; $tva = 20;
$prix_ttc = $prix_ht * (1 + $tva / 100);
echo '<p>Le prix TTC du produit est de ' . h(number_format($prix_ttc, 0, ',', ' ')) . ' €.</p>';
?>
<h2>Exercice 1.4 — Types et conversions</h2>
<?php
$test = 42; $test = (string)$test;
echo '<p>$test après cast en string : '; var_dump($test); echo '</p>';
// Résultats attendus : 0, 0.0, '0', '', [], null sont false ; 'abc' est true.
echo '<p>Conversions booléennes (valeur puis booléen) :</p><pre>';
foreach ([0, 0.0, '0', '', 'abc', [], null] as $v) { var_export($v); echo ' -> '; var_dump((bool)$v); }
echo '</pre><p>Conversions numériques : <code>(int)3.9 = ' . (int)3.9 . '</code>, <code>(int)"12abc" = ' . (int)'12abc' . '</code>, <code>(float)"1.5e3" = ' . (float)'1.5e3' . '</code>, <code>(int)true = ' . (int)true . '</code>.</p>';
$decimal = 255; $hex = 0xFF; $octal = 0377; $binaire = 0b11111111;
echo '<p>255 en décimal : ' . $decimal . ' ; hexadécimal : ' . $hex . ' ; octal : ' . $octal . ' ; binaire : ' . $binaire . '.</p>';
?>
<h2>Exercice 1.5 — Chaînes</h2>
<?php
$traitees = 'égales à'; $ici = 2;
echo '<p>' . 'Ahmed a dit : "J\'ai réussi"' . '</p>';
echo '<p>' . 'Voulez-vous supprimer C:\\*.*?' . '</p>';
echo '<p>' . 'Ceci n\'affichera pas \\n de nouvelle ligne (le \\n doit apparaître tel quel)' . '</p>';
echo '<p>Les variables ne seront pas $traitees $ici (variables non interprétées)</p>';
echo "<p>Les variables seront {$traitees} {$ici} (variables interprétées)</p>";
$texte = '*Bonjour les développeurs*'; $nettoye = trim($texte, '*');
echo '<p>Après trim() : ' . h($nettoye) . ' ; strlen() en octets : ' . strlen($nettoye) . '.</p><p>Caractères :</p>';
$lettres = preg_split('//u', $nettoye, -1, PREG_SPLIT_NO_EMPTY);
for ($i = 0; $i < count($lettres); $i++) echo h($lettres[$i]) . '<br>';
?>
<?php include __DIR__ . '/includes/pied_inc.php'; ?>



