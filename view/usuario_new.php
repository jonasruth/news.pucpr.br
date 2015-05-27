<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body>
<h1>Cadastro de Usuário</h1>

<form action="<?php echo $myRoute->createLink('salvar_usuario',array()); ?>">
    <p>Exibir aqui o formulário</p>

    <a href="<?php echo $myRoute->createLink('ger_usuarios',array()); ?>">cancelar</a>
    <button type="submit">Salvar</button>
</form>
</body>
</html>