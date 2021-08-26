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
    <style type="text/css">
        #tree{
            width:100%;
            height:100%;
        }
    </style>

</head>
<body class="main">

<?php $this->load->view('layouts/_navbar') ?>

        <div class="content">
            <h2 class="intro-y text-lg font-medium mt-10">
                MEMBER NETWORKS
            </h2>
            <div style="width:100%; height:700px;" id="tree"/>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/app.js"></script>
<script src="<?= base_url() ?>assets/js/orgchart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

<script type="text/javascript">
    function pdf(nodeId) {
        chart.exportPDF({filename: "Member Networks.pdf", expandChildren: true, nodeId: nodeId});
    }
    function png(nodeId) {
        chart.exportPNG({filename: "Member Networks.png", expandChildren: true, nodeId: nodeId});
    }
    function svg(nodeId) {
        chart.exportSVG({filename: "Member Networks.svg", expandChildren: true, nodeId: nodeId});
    }

    var chart = new OrgChart(document.getElementById("tree"), {
        template: "derek",
        mouseScrool: OrgChart.action.none,
        collapse: {
            level: 1
        },
        menu: {
            export_pdf: {
                text: "Export PDF",
                icon: OrgChart.icon.pdf(24, 24, "#7A7A7A"),
                onClick: pdf
            },
            export_png: {
                text: "Export PNG",
                icon: OrgChart.icon.png(24, 24, "#7A7A7A"),
                onClick: png
            },
            export_svg: {
                text: "Export SVG",
                icon: OrgChart.icon.svg(24, 24, "#7A7A7A"),
                onClick: svg
            }
        },
        nodeMenu: {
            export_pdf: {
                text: "Export PDF",
                icon: OrgChart.icon.pdf(24, 24, "#7A7A7A"),
                onClick: pdf
            },
            export_png: {
                text: "Export PNG",
                icon: OrgChart.icon.png(24, 24, "#7A7A7A"),
                onClick: png
            },
            export_svg: {
                text: "Export SVG",
                icon: OrgChart.icon.svg(24, 24, "#7A7A7A"),
                onClick: svg
            }
        },
        nodeBinding: {
            field_0: "name",
            field_1: "title",
            img_0: "img"
        },
        nodes: [
            { id: 1, name: "Parent", title: "3 Child", img: "https://cdn.balkan.app/shared/empty-img-none.svg" },
            { id: 2, pid: 1, name: "Child 1", title: "0 Child", img: "https://cdn.balkan.app/shared/empty-img-none.svg" },
            { id: 3, pid: 1, name: "Child 1", title: "0 Child", img: "https://cdn.balkan.app/shared/empty-img-none.svg" },
            { id: 4, pid: 3, name: "Child 3", title: "1 Child", img: "https://cdn.balkan.app/shared/empty-img-none.svg" }
        ]
    });
</script>

</body>
</html>
