<?php
// Auteur : Assia Tyane | Objectif : fermer l'interface et afficher les dates | Date : 16/10/2026
$finSemestre = new DateTime('2027-01-31');
$aujourdhui = new DateTime('today');
$joursRestants = $aujourdhui > $finSemestre ? 0 : (int)$aujourdhui->diff($finSemestre)->format('%a');
?>
</main><footer><small>Date : <?= date('d/m/Y') ?> · Fin de semestre choisie : <?= $finSemestre->format('d/m/Y') ?> (<?= $joursRestants ?> jour(s) restant(s)).</small></footer>
</body></html>

