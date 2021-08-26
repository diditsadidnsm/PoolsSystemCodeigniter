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
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?= isset($title) ? $title : 'Pools Admin' ?> - Pools Admin</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css" />
</head>
<body class="main">

		<?php $this->load->view('layouts/_navbar'); ?>
        
		<?php $this->load->view($page); ?>

        <script src="<?= base_url() ?>assets/js/app.js"></script>
        <script src="<?= base_url() ?>node_modules/socket.io/node_modules/socket.io-client/socket.io.js"></script>
</body>
</html>
