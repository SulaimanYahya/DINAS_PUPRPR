<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>ok/css/dataTables.bootstrap4.css">

    <script type="text/javascript" src="<?= base_url('assets/'); ?>ok/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>ok/js/datatables.min.js"></script>
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?= base_url('assets/'); ?>plugin/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>selek2/css/select2.css" rel="stylesheet">

</head>

<style type="text/css">
    .bghover {

        background-color: #ed0598;
    }

    body {

        color: #000000;
    }

    td {

        color: #000000;
    }

    th {

        color: #000000;
    }

    .holis {
        background-image: url('<?= base_url('assets/'); ?>img/profile/bg_s.png');
        height: 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }

    #gradient-horizontal {
        background-image: linear-gradient(to right, #c208d3, #8af8ef, #c208d3);
    }

    .gradient-status {
        background-image: linear-gradient(to right, #a7dbfb, #8af8ef, #c208d3);
    }

    .gradient-card {
        background-image: linear-gradient(to right, #fefefe, #a7dbfb, #0f88d5);
    }

    #gradient-popup {
        background-image: linear-gradient(#c208d3, #2bc8bf, #c208d3);
    }

    .gradient-status-gagal {
        background-image: linear-gradient(to right, #fefefe, #f99092, #aa0307);
    }

    .gradient-card-primary {
        background-image: linear-gradient(to right, #0f88d5, #74c3f5);
    }

    .gradient-card-warning {
        background-image: linear-gradient(to right, #ffc900, #fae491);
    }

    .gradient-card-success {
        background-image: linear-gradient(to right, #3bb975, #7eeab0);
    }

    .gradient-card-danger {
        background-image: linear-gradient(to right, #ff1592, #f773ba);
    }

    .gradient-vertical {
        background-image: linear-gradient(#c208d3, #2ed8ce, #c208d3);
    }

    .gradient-huruf {
        background: -webkit-linear-gradient(to right, #c208d3, #2ed8ce, #c208d3);
        background: linear-gradient(to right, #c208d3, #2ed8ce, #c208d3);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">