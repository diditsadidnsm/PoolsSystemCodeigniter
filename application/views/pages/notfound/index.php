<!DOCTYPE html>
<?php foreach(getTheme() as $theme) : ?>
<html lang="en" class="<?= $theme->is_active ? 'light' : 'dark' ?>">
<?php endforeach; ?>
<head>
    <meta charset="utf-8">
    <link href="<?= base_url('/images/logo/pools_logo.png') ?>" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="sadid">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css" />
</head>
<body class="main">
<div class="container">
    <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
        <div class="-intro-x lg:mr-20">
            <img alt="Pools 404 page" class="h-48 lg:h-auto" src="<?= base_url() ?>assets/images/error-illustration.svg">
        </div>
        <div class="text-white mt-10 lg:mt-0">
            <div class="intro-x text-8xl font-medium">404</div>
            <div class="intro-x text-xl lg:text-3xl font-medium mt-5">Oops. This page has gone missing.</div>
            <div class="intro-x text-lg mt-3">You may have mistyped the address or the page may have moved.</div>
            <a href="javascript:history.back(-1)" class="intro-x btn py-3 px-4 text-white border-white dark:border-dark-5 dark:text-gray-300 mt-10">Back to Home</a>
        </div>
    </div>
</div>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<script src="<?= base_url() ?>assets/js/app.js"></script>
</body>
</html>