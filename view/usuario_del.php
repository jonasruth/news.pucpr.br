<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body>

<h1>Exclusão do usuário <?php echo \NewsPucpr\UsuarioDAO::find($myRoute->getParam('id'))->nome ?></h1>

Se o usuário foi excluído com sucesso, exibir isso: <br/>
<h1>Sucesso!</h1>
<p>O usuário foi excluído com sucesso!</p>
<br/><br/><br/>
Se houve erro ao excluir usuário, exibir isso <br/>
<h1>Ops..</h1>
<p>O usuário NÃO foi excluído conforme solicitado..</p>

<a href="<?php echo $myRoute->createLink('ger_usuarios',array()); ?>">Gerenciar Usuários</a>

</body>
</html>