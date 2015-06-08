<!DOCTYPE html>
<head>
    <title>Dashboard Template for Bootstrap</title>

    <?php include('html_include/adm-header.html'); ?>
</head>

<body>

<?php include('html_include/adm-head-bar.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <?php echo \NewsPucpr\MenuAdm::create() ?>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Seja Bem-Vindo</h1>

            <h2 class="sub-header">O que fazer agora?</h2>

            <p>Utilize o menu no lado esquerdo para administrar o site.</p>

        </div>
    </div>
</div>

<?php include('html_include/adm-scripts.html'); ?>
</body>
</html>
