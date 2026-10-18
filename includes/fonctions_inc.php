<?php
// Auteur : Assia Tyane | Objectif : fonctions partagées | Date : 16/10/2026
require_once __DIR__ . '/../config.php';

if (!function_exists('mention')) {
    function mention(float|int $note): string
    {
        if ($note >= 16) return 'Très bien';
        if ($note >= 14) return 'Bien';
        if ($note >= 12) return 'Assez bien';
        if ($note >= SEUIL) return 'Passable';
        return 'Ajourné';
    }
}

function h(mixed $valeur): string
{
    return htmlspecialchars((string)$valeur, ENT_QUOTES, 'UTF-8');
}

