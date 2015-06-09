<!DOCTYPE html>
<head>
    <title>Administração PUCPR News</title>

    <?php include('html_include/adm-header.php'); ?>

</head>

<body>

<?php include('html_include/adm-head-bar.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <?php echo \JonasRuth\NewsPucpr\MenuAdm::create() ?>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?php $sucesso = \JonasRuth\NewsPucpr\UsuarioController::deletarAction($myRoute->getParam('id')) ?>
            <h1 class="page-header">Usuários</h1>

            <?php if($sucesso): ?>
                <h2 class="sub-header">Exclusão</h2>
                <div class="alert alert-success" role="alert">
                O usuário foi excluído com sucesso!
                </div>
            <?php else: ?>
                <h2 class="sub-header">Oops..</h2>
                <div class="alert alert-danger" role="alert">
                   O usuário NÃO foi excluído conforme solicitado..
                </p>
            <?php endif; ?>

            <a class="btn btn-info" href="<?php echo $myRoute->createLink('ger_usuarios', array()); ?>">Voltar para administração de Usuários</a>

        </div>
    </div>
</div>

<?php include('html_include/adm-scripts.html'); ?>

</body>
</html>
