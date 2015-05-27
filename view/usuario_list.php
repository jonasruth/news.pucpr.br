<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body>
<h1>Usuários</h1>

<a href="<?php echo $myRoute->createLink('new_usuario',array()); ?>">Novo</a>

<?php
use NewsPucpr\UsuarioController;
UsuarioController::listarAction();
?>
</body>
</html>