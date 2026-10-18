<?php
// Auteur : Assia Tyane | Objectif : pratiquer conditions, switch et boucles | Date : 17/10/2026
require_once __DIR__ . '/includes/fonctions_inc.php';
$titrePage = 'Partie 2 — Structures de contrôle';
include __DIR__ . '/includes/entete_inc.php'; include __DIR__ . '/includes/menu_inc.php';
?>
<h2>Exercice 2.1 — Mentions</h2>
<table><tr><th>Note</th><th>Mention</th></tr>
<?php foreach ([18, 15, 13, 10, 8] as $note): ?><tr><td><?= $note ?></td><td><?= h(mention($note)) ?></td></tr><?php endforeach; ?>
</table>
<h2>Exercice 2.2 — Mois courant</h2>
<?php
$mois = (int)date('m');
switch ($mois) {
    case 1: $nomMois='janvier'; break; case 2: $nomMois='février'; break;
    case 3: $nomMois='mars'; break; case 4: $nomMois='avril'; break;
    case 5: $nomMois='mai'; break; case 6: $nomMois='juin'; break;
    case 7: $nomMois='juillet'; break; case 8: $nomMois='août'; break;
    case 9: $nomMois='septembre'; break; case 10: $nomMois='octobre'; break;
    case 11: $nomMois='novembre'; break; case 12: $nomMois='décembre'; break;
    default: $nomMois='mois inconnu';
}
echo '<p>Nous sommes en ' . h($nomMois) . '.</p>';
?>
<p class="boite">Sans <code>break</code>, l'exécution continue dans les cases suivantes (fall-through) jusqu'à rencontrer un break ou la fin du switch.</p>
<h2>Exercice 2.3 — Boucles</h2>
<h3>Triangle</h3><pre><?php for ($ligne=1; $ligne<=6; $ligne++) { for ($col=1; $col<=$ligne; $col++) echo '*'; echo "\n"; } ?></pre>
<h3>while : nombres pairs de 0 à 20</h3><p><?php $i=0; while ($i<=20) { echo $i===10 ? '<strong>10</strong> ' : $i . ' '; $i+=2; } ?></p>
<h3>for + continue : pairs de 0 à 10</h3><p><?php for ($i=0; $i<=10; $i++) { if ($i%2!==0) continue; echo $i . ' '; } ?></p>
<h3>while, switch et break 2</h3><pre><?php
$i=1; while ($i<=12) { switch ($i) { case 5: echo "At 5\n"; break; case 10: echo "At 10; quitting\n"; break 2; } $i++; }
?></pre>
<h3>do-while</h3><p><?php $i=0; do { echo $i . ' '; $i+=2; } while ($i<=20); ?></p>
<p>Contrairement à <code>while</code>, <code>do-while</code> exécute son bloc au moins une fois avant de tester la condition.</p>
<?php include __DIR__ . '/includes/pied_inc.php'; ?>

