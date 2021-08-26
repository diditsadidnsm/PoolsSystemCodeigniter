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

<?php $this->load->view('layouts/_navbar') ?>

<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        MEMBER NETWORKS
    </h2>
    <div style="width:100%; height:700px;" id="orgchart"/>
</div>
</div>
</div>

<script src="<?= base_url() ?>assets/js/app.js"></script>
<script src="<?= base_url() ?>assets/js/orgchart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function (){
        var chart = new OrgChart(document.getElementById("orgchart"), {
            $.ajax({
                type: "GET",
                url: "administrator/membernetworks/getMembers",
                dataType: "json",
                success: function(response)
                {
                    initTree(response)
                }
            });
            nodeBinding: {
                field_0: "username"
            },
            function initTree(treeData) {
            $('#orgchart').treeview({data: treeData});
        }
    });
    })
</script>

<script>
    $(document).ready(function (){
        var chart = new OrgChart(document.getElementById("orgchart"), {
            $.ajax({
                type: "GET",
                url: "<?= base_url() ?>administrator/membernetworks/getMembers",
                dataType: "json",
                success: function(response)
                {
                    initTree(response)
                }
            });
            nodeBinding: {
                field_0: "username"
            },
            function initTree(chart) {
            $('#orgchart').nodes : [{data: chart}];
        }
    });
    })
</script>

</body>
</html>
