<?php
// Auteur : Assia Tyane | Objectif : créer, afficher, analyser et trier des tableaux | Date : 17/10/2026
require_once __DIR__ . '/includes/fonctions_inc.php';
$titrePage = 'Partie 3 — Tableaux';
// Expérience include/require : include sur un fichier absent émet un avertissement puis continue ; require échoue de façon fatale et arrête le script.
// Inclure menu_inc.php deux fois avec include duplique le menu ; include_once ne l'affiche qu'une seule fois.
include __DIR__ . '/includes/entete_inc.php'; include __DIR__ . '/includes/menu_inc.php';
$notes = ['Mohamed'=>16, 'Ahmed'=>14, 'Hind'=>13, 'Aicha'=>15, 'Samir'=>13, 'Zakaria'=>13, 'Rafik'=>10, 'Ilham'=>9, 'Hamza'=>7, 'Sami'=>7, 'Noura'=>14];
$modules = ['PHP', 'Algorithmique', 'Bases de données'];
function afficher(array $tab): void { echo '<ul>'; foreach ($tab as $cle=>$valeur) echo '<li>' . h($cle) . ' : ' . h($valeur) . '</li>'; echo '</ul>'; }
?>
<h2>Exercice 3.1 — Modules</h2><p>foreach :</p><?php afficher($modules); ?><p>Accès par indice : <?= h($modules[0]) ?>, <?= h($modules[1]) ?>, <?= h($modules[2]) ?>.</p>
<h2>Exercice 3.2 — Notes et mentions</h2>
<table><tr><th>Nom</th><th>Note</th><th>Mention</th></tr>
<?php foreach ($notes as $nom=>$note): ?><tr class="<?= $note<SEUIL?'faible':'' ?>"><td><?= h($nom) ?></td><td><?= $note ?></td><td><?= h(mention($note)) ?></td></tr><?php endforeach; ?>
</table>
<h2>Exercice 3.3 — Statistiques</h2>
<?php
$somme=0; $meilleure=NOTE_MIN; $plusFaible=NOTE_MAX; $effectifs=[];
foreach ($notes as $note) { $somme += $note; if ($note>$meilleure) $meilleure=$note; if ($note<$plusFaible) $plusFaible=$note; $m=mention($note); $effectifs[$m]=($effectifs[$m]??0)+1; }
$moyenne=$somme/count($notes);
echo '<p>Somme : '.$somme.' ; moyenne : '.number_format($moyenne,2,',',' ').' ; meilleure : '.$meilleure.' ; plus faible : '.$plusFaible.'.</p>';
echo '<p>Vérification array_sum/count/max/min : '.array_sum($notes).' / '.count($notes).' / '.max($notes).' / '.min($notes).'.</p>';
?>
<h3>Effectifs par mention</h3><?php afficher($effectifs); ?>
<h2>Exercice 3.4 — Tris</h2>
<h3>Noms croissants (ksort)</h3><?php $t=$notes; ksort($t); afficher($t); ?>
<h3>Notes décroissantes (arsort)</h3><?php $t=$notes; arsort($t); afficher($t); ?>
<h3>Noms décroissants (krsort)</h3><?php $t=$notes; krsort($t); afficher($t); ?>
<h3>Notes croissantes (asort)</h3><?php $t=$notes; asort($t); afficher($t); ?>
<p>Pour un tableau indexé comme <code>$modules</code>, on peut utiliser <code>sort()</code> ou <code>rsort()</code>.</p>
<h2>Exercice 3.5 — Opérateurs de tableaux</h2>
<?php $a=['x'=>1,'y'=>2]; $b=['y'=>2,'x'=>1]; echo '<pre>'; var_export($a+$b); echo "\n"; var_dump($a==$b, $a===$b); echo '</pre>'; ?>
<p>L'union <code>+</code> conserve les valeurs de gauche pour les clés déjà présentes. <code>==</code> compare clés et valeurs sans imposer le même ordre ; <code>===</code> exige aussi le même ordre et les mêmes types. Ici : union = tableau x,y ; égalité simple = true ; égalité stricte = false.</p>
<?php include __DIR__ . '/includes/pied_inc.php'; ?>


