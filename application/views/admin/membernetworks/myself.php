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
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <style>

        .pg-orgchart{
            width:1900px
        }
        .org-chart ul {
            padding-top: 20px;
            position: relative;
            transition: all 0.5s;
        }
        .org-chart ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 1px solid #ccc;
            width: 0;
        }
        .org-chart li {
            float: left;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 10px;
            transition: all 0.5s;
        }
        .org-chart li::before, .org-chart li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 1px solid #ccc;
            width: 50%;
            height: 20px;
        }
        .org-chart li::after {
            right: auto;
            left: 50%;
            border-left: 1px solid #ccc;
        }
        .org-chart li:only-child::after, .org-chart li:only-child::before {
            display: none;
        }
        .org-chart li:only-child {
            padding-top: 0;
        }
        .org-chart li:first-child::before, .org-chart li:last-child::after {
            border: 0 none;
        }
        .org-chart li:last-child::before {
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
        }
        .org-chart li:first-child::after {
            border-radius: 5px 0 0 0;
        }
        .org-chart li .user {
            text-decoration: none;
            color: #666;
            display: inline-block;
            padding: 20px 10px;
            transition: all 0.5s;
            background: #fff;
            min-width: 180px;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }
        .org-chart li .user:hover, .org-chart li .user:hover + ul li .user {
            background: #b5d5ef;
            color: #002A50;
            transition: all 0.15s;
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
            box-shadow: inset 0 0 0 3px #76b1e1, 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }
        .org-chart li .user:hover img, .org-chart li .user:hover + ul li .user img {
            box-shadow: 0 0 0 5px #4c99d8;
        }
        .org-chart li .user:hover + ul li::after,
        .org-chart li .user:hover + ul li::before,
        .org-chart li .user:hover + ul::before,
        .org-chart li .user:hover + ul ul::before {
            border-color: #94a0b4;
        }
        .org-chart li .user > div, .org-chart li .user > a {
            font-size: 12px;
        }
        .org-chart li .user img {
            margin: 0 auto;
            max-width: 60px;
            max-width: 60px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-shadow: 0 0 0 5px #aaa;
        }
        .org-chart li .user .name {
            font-size: 16px;
            margin: 15px 0 0;
            font-weight: 300;
        }
        .org-chart li .user .role {
            font-weight: 600;
            margin-bottom: 10px;
            margin-top: 5px;
        }
        .org-chart li .user .manager {
            font-size: 12px;
            color: #b21e04;
        }

    </style>

</head>
<body class="main">

<?php $this->load->view('layouts/_navbar') ?>

<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        MEMBER NETWORKS
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="pg-orgchart">
            <div class="org-chart">
                <ul>
                    <li>
                        <div class="user" id="first">
                            <img src="https://www.milifestylemarketing.com/Images/Disable.jpg" class="img-responsive" />
                            <div class="name">Parent</div>
                            <div class="role">Disini Parent</div>
                            <button id="toggle" class="manager">17 Child</button>
                        </div>
                        <ul class="bukaTutup">
                            <!--                                    Disini Child Kanan-->
                            <li>
                                <div class="user" id="second">
                                    <img src="https://www.milifestylemarketing.com/Images/Yellow.png" class="img-responsive" />
                                    <div class="name">Kanan 1</div>
                                    <div class="role">Disini Child Kanan</div>
                                    <button id="toggle" class="manager" href="#">6 Child</button>
                                </div>
                                <ul>
                                    <li>
                                        <div class="user">
                                            <img src="https://www.milifestylemarketing.com/Images/Disable.jpg" class="img-responsive" />
                                            <div class="name">Kanan 2</div>
                                            <div class="role">Disini Child Kanan Kanan</div>
                                            <a class="manager" href="#">2 Child</a>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="user">
                                                    <img src="https://www.milifestylemarketing.com/Images/Disable.jpg" class="img-responsive" />
                                                    <div class="name">Kanan 3</div>
                                                    <div class="role">Disini Child Kanan Kanan</div>
                                                    <a class="manager" href="#">0 Child</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="user">
                                                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/arashmil/128.jpg" class="img-responsive" />
                                                    <div class="name">Kanan 4</div>
                                                    <div class="role">Disini Child Kanan Kiri</div>
                                                    <a class="manager" href="#">0 Child</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="user">
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/arashmil/128.jpg" class="img-responsive" />
                                            <div class="name">Kanan 5</div>
                                            <div class="role">Disini Child Kanan Kiri</div>
                                            <a class="manager" href="#">2 Child</a>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="user">
                                                    <img src="https://www.milifestylemarketing.com/Images/Disable.jpg" class="img-responsive" />
                                                    <div class="name">Kanan 6</div>
                                                    <div class="role">Disini Child Kanan Kanan</div>
                                                    <a class="manager" href="#">0 Child</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="user">
                                                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/arashmil/128.jpg" class="img-responsive" />
                                                    <div class="name">Kanan 7</div>
                                                    <div class="role">Disini Child Kanan Kiri</div>
                                                    <a class="manager" href="#">0 Child</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!--                                    Disini Child Kiri-->
                            <li>
                                <div class="user" id="third">
                                    <img src="https://www.milifestylemarketing.com/Images/Yellow.png" class="img-responsive" />
                                    <div class="name">Kiri 1</div>
                                    <div class="role">Disini Child Kiri</div>
                                    <a class="manager" href="#">6 Child</a>
                                </div>
                                <ul>
                                    <li>
                                        <div class="user">
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/marcosmoralez/128.jpg" class="img-responsive" />
                                            <div class="name">Kiri 2</div>
                                            <div class="role">Disini Child Kiri Kanan</div>
                                            <a class="manager" href="#">2 Child</a>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="user">
                                                    <img src="https://www.milifestylemarketing.com/Images/Disable.jpg" class="img-responsive" />
                                                    <div class="name">Kiri 3</div>
                                                    <div class="role">Disini Child Kiri Kanan</div>
                                                    <a class="manager" href="#">0 Child</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="user">
                                                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/arashmil/128.jpg" class="img-responsive" />
                                                    <div class="name">Kiri 4</div>
                                                    <div class="role">Disini Child Kiri Kiri</div>
                                                    <a class="manager" href="#">0 Child</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="user">
                                            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/jina/128.jpg" class="img-responsive" />
                                            <div class="name">Kiri 5</div>
                                            <div class="role">Disini Child Kiri Kiri</div>
                                            <a class="manager" href="#">2 Child</a>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="user">
                                                    <img src="https://www.milifestylemarketing.com/Images/Disable.jpg" class="img-responsive" />
                                                    <div class="name">Kiri 6</div>
                                                    <div class="role">Disini Child Kiri Kanan</div>
                                                    <a class="manager" href="#">0 Child</a>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="user">
                                                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/arashmil/128.jpg" class="img-responsive" />
                                                    <div class="name">Kiri 7</div>
                                                    <div class="role">Disini Child Kiri Kiri</div>
                                                    <a class="manager" href="#">0 Child</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="<?= base_url() ?>assets/js/app.js"></script>
<script src="<?= base_url() ?>assets/js/orgchart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    const targetDiv = document.getElementById({});
    const btn = document.getElementById("toggle");
    btn.onclick = function () {
        if (targetDiv.style.visibility !== "hidden") {
            targetDiv.style.visibility = "hidden";
        } else {
            targetDiv.style.visibility = "visible";
        }
    };
</script>

</body>
</html>
