<?php require_once __DIR__ . '/../config.php' ?>
<!doctype html>
<html lang="<?= SITE_LANG; ?>" data-bs-theme="light">

<head>
    <!-- TITLE -->
    <title>Website Project</title>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="<?= SITE_AUTHOR ?>">
    <meta name="description" content="<?= SITE_DESCRIPTION ?>">
    <meta name="keywords" content="<?= SITE_KEYWORDS ?>">
    <link rel="shortcut icon" href="<?= resources('../favicon.ico') ?>" type="image/x-icon">
    <link rel="manifest" href="<?= resources('../manifest.json') ?>">

    <title>
        SITE_TITLE
    </title>

    <!-- CDN -->
    <?php include __DIR__ . '/cdn.php' ?>

    <?php foreach ($assets ?? [] as $asset): ?>
        <link rel="stylesheet" href="<?php resources('assets/' . $asset) ?>">
    <?php endforeach; ?>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= resources('assets/css/' . $css) ?? 'style.css' ?>">

    <!-- Custom JS -->
    <script src="<?= resources('assets/js/' . $js ?? 'script.js') ?>"></script>

</head>

<!-- ! DO NOT ADDNOTHING DOWN HERE  -->