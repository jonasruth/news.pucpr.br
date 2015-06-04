<!DOCTYPE html>
<head>
    <title>Dashboard Template for Bootstrap</title>

    <?php include('html_include/adm-header.html'); ?>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PUCPR News - Administração</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <?php echo \NewsPucpr\MenuAdm::create() ?>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?php $sucesso = \NewsPucpr\UsuarioController::deletarAction($myRoute->getParam('id')) ?>
            <h1 class="page-header">Usuários</h1>


            <?php if($sucesso): ?>
                <h2 class="sub-header">Exclusão do usuário <?php echo \NewsPucpr\UsuarioDAO::find($myRoute->getParam('id'))->nome ?></h2>
                <p>O usuário foi excluído com sucesso!</p>
            <?php else: ?>
                <h2 class="sub-header">Oops..</h2>
                <p>O usuário NÃO foi excluído conforme solicitado..</p>
            <?php endif; ?>

            <a class="btn btn-info" href="<?php echo $myRoute->createLink('ger_usuarios', array()); ?>">Voltar para administração Usuários</a>

        </div>
    </div>
</div>

<?php include('html_include/adm-scripts.html'); ?>

</body>
</html>
