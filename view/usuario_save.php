<?php $usuario = \NewsPucpr\UsuarioDAO::find($myRoute->getParam('id')) ?>
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
            <?php print_r($_POST) ?>
            <?php $sucesso = \NewsPucpr\UsuarioController::salvarAction($_POST['usuario']) ?>
            <h1 class="page-header">Usuários</h1>


            <?php if($sucesso): ?>
                <h2 class="sub-header">Salvamento do usuário <?php echo \NewsPucpr\UsuarioDAO::find($myRoute->getParam('id'))->nome ?></h2>
                <p>O usuário foi salvo com sucesso!</p>
            <?php else: ?>
                <h2 class="sub-header">Oops..</h2>
                <p>O usuário NÃO foi salvo conforme solicitado..</p>
            <?php endif; ?>

            <a class="btn btn-info" href="<?php echo $myRoute->createLink('ger_usuarios', array()); ?>">Voltar para administração Usuários</a>

        </div>
    </div>
</div>

<?php include('html_include/adm-scripts.html'); ?>

</body>
</html>
