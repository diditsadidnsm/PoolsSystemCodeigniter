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
    <link rel="stylesheet" href="https://rawgit.com/lvlds/treant-js/master/Treant.css" type="text/css"/>

</head>
<body class="main">

<?php $this->load->view('layouts/_navbar') ?>

<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        MEMBER NETWORKS
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div id="tree-simple" style="width:335px; height: 160px"> </div>
    </div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://rawgit.com/lvlds/treant-js/master/vendor/raphael.js"></script>
<script src="https://rawgit.com/lvlds/treant-js/master/Treant.js"></script>
<script src="<?= base_url() ?>assets/js/app.js"></script>

<script type="text/javascript">

    let config = {
        container: "#tree-simple"
    };


    let ItaipuDam = [
        {
            "key": "CA",
            "displayName": "Consejo de Administración",
            "parent": null
        },
        {
            "key": "DE",
            "displayName": "Directorio Ejecutivo",
            "parent": "CA"
        },
        {
            "key": "DG",
            "displayName": "Dirección General",
            "parent": "DE"
        },
        {
            "key": "DT",
            "displayName": "Dirección Técnica",
            "parent": "DG"
        },
        {
            "key": "DJ",
            "displayName": "Dirección Jurídica",
            "parent": "DG"
        },
        {
            "key": "DA",
            "displayName": "Dirección Administrativa",
            "parent": "DG"
        },
        {
            "key": "DF",
            "displayName": "Dirección Financiera",
            "parent": "DG"
        },
        {
            "key": "DC",
            "displayName": "Dirección de Coordinación",
            "parent": "DG"
        },
        {
            "key": "GP",
            "displayName": "Director General Paraguayo",
            "parent": "DG"
        },
        {
            "key": "GB",
            "displayName": "Director General Brasilero",
            "parent": "DG"
        },
        {
            "key": "SI.GG",
            "displayName": "Superintendencia de Informatica",
            "parent": "GP"
        },
        {
            "key": "SIS.GG",
            "displayName": "Departamento de planeamiento de sistemas y administracion de datos",
            "parent": "SI.GG"
        },
        {
            "key": "SISP.GG",
            "displayName": "Division de planeamiento de Sistemas",
            "parent": "SIS.GG"
        },
        {
            "key": "SISD.GG",
            "displayName": "Division de administracion de Sistemas",
            "parent": "SIS.GG"
        },
        {
            "key": "SID.GG",
            "displayName": "Division de desarrollo y mantenimiento de Sistemas",
            "parent": "SI.GG"
        },
        {
            "key": "SID1.GG",
            "displayName": "Division de Sistemas I",
            "parent": "SID.GG"
        },
        {
            "key": "SID2.GG",
            "displayName": "Division de Sistemas II",
            "parent": "SID.GG"
        },
        {
            "key": "SIP.GG",
            "displayName": "Departamento de produccion y soporte tecnico",
            "parent": "SI.GG"
        },
        {
            "key": "SIPP.GG",
            "displayName": "Division de produccion",
            "parent": "SIP.GG"
        },
        {
            "key": "SIPS.GG",
            "displayName": "Div de soporte tecnico",
            "parent": "SIP.GG"
        },
        {
            "key": "SIT.GG",
            "displayName": "Departamento de teleprocesamiento y microinformatica",
            "parent": "SI.GG"
        },
        {
            "key": "SITT.GG",
            "displayName": "Division de teleprocesamiento",
            "parent": "SIT.GG"
        },
        {
            "key": "SITM.GG",
            "displayName": "Division de microinformatica",
            "parent": "SIT.GG"
        }
    ]

    let treantArray = ItaipuDam.map((item) => {
        return {
            key: item.key,
            parent: item.parent,
            text: {
                name: `${item.key} - ${item.displayName}`
            }
        }
    });

    let nodes = treantArray.map((item) => {
        let parent = treantArray.filter((el) => {
            return el.key == item.parent;
        });
        return {
            parent: parent.length > 0 ? parent[0] : null,
            text: {
                name: item.name
            }
        }
    });

    let simple_chart_config = [
        config, nodes
    ];

    var chart = new Treant(simple_chart_config, function() { alert( 'Tree Loaded' ) }, $ );
</script>

</body>
</html>
