<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body>

<?php print_r($_POST) ?>
<?php $sucesso = \NewsPucpr\UsuarioController::salvarAction($_POST['usuario']) ?>

<h1>Salvamento do usuário <?php echo \NewsPucpr\UsuarioDAO::find($myRoute->getParam('id'))->nome ?></h1>

<?php if($sucesso): ?>
<h1>Sucesso!</h1>

<p>O usuário foi salvo com sucesso!</p>
<?php else: ?>
<h1>Ops..</h1>

<p>O usuário NÃO foi salvo conforme solicitado..</p>
<?php endif; ?>

<a href="<?php echo $myRoute->createLink('ger_usuarios', array()); ?>">Gerenciar Usuários</a>

</body>
</html>