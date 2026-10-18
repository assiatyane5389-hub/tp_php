<?php
// Auteur : Assia Tyane | Objectif : ouvrir l'interface HTML | Date : 16/10/2026
require_once __DIR__ . '/../config.php';
$titrePage = $titrePage ?? ETABLISSEMENT;
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($titrePage, ENT_QUOTES, 'UTF-8') ?></title>
  <style>
    :root { font-family: system-ui, sans-serif; color: #1f2937; background: #f5f7fa; }
    body { max-width: 900px; margin: 2rem auto; padding: 0 1rem; }
    header, main, footer { background: white; padding: 1.25rem; border-radius: .6rem; margin-bottom: 1rem; }
    nav { display: flex; flex-wrap: wrap; gap: .8rem; }
    a { color: #075985; } input, select, button { font: inherit; padding: .45rem; margin: .2rem 0 .7rem; }
    label { display: block; } table { border-collapse: collapse; width: 100%; margin: 1rem 0; }
    th, td { border: 1px solid #cbd5e1; padding: .5rem; text-align: left; }
    th { background: #e2e8f0; } .erreur { color: #a11; } .ok { color: #176b39; }
    .faible { color: #b00020; } .boite { padding: .75rem; background: #eef6ff; border-left: 4px solid #0284c7; }
    pre { white-space: pre-wrap; overflow-wrap: anywhere; }
  </style>
</head>
<body>
<header><h1><?= htmlspecialchars(ETABLISSEMENT, ENT_QUOTES, 'UTF-8') ?> — Suivi des notes</h1>

