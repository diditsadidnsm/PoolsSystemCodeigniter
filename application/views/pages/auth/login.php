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
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css" />
</head>
<?= form_open('login', ['method' => 'POST']) ?>
<body class="login">
<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">

        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img alt="Icewall Tailwind HTML Admin Template" class="w-6" src="<?= base_url('/images/logo/pools_logo.png') ?>">
                <span class="text-white text-lg ml-3"> Pools<span class="font-medium"> Admin</span> </span>
            </a>
            <div class="my-auto">
                <img alt="Icewall Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="<?= base_url() ?>assets/images/illustration.svg">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    A few more clicks to
                    <br>
                    sign in to your account.
                </div>
                <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Manage all your member accounts in one place</div>
            </div>
        </div>
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                    Sign In
                </h2>
                <?php $this->load->view('layouts/_alert') ?>
                <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your member accounts in one place</div>
                <div class="intro-x mt-8">
                    <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'intro-x login__input form-control py-3 px-4 border-gray-300 block', 'placeholder' => 'Email Address']) ?>
                    <?= form_error('email') ?>
                    <?= form_password('password', '', ['class' => 'intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4', 'placeholder' => 'Password']) ?>
                    <?= form_error('password') ?>
                </div>
                <div class="intro-x flex text-gray-700 dark:text-gray-600 text-xs sm:text-sm mt-4">
                    <div class="flex items-center mr-auto">
                        <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                        <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                    </div>
                </div>
                <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                    <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>
<script src="<?= base_url() ?>assets/js/app.js"></script>
</body>
</html>
