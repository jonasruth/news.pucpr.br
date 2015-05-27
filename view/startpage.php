<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body>
<h1>Seja bem vindo</h1>
<ul>
    <li><a href="<?php echo $myRoute->createLink('noticias',array()); ?>">Ler notícias</a></li>
    <li><a href="<?php echo $myRoute->createLink('ger_startpage',array()); ?>">Gerenciar notícias</a></li>
    <li><a href="<?php echo $myRoute->createLink('ger_usuarios',array('nome'=>'joao')); ?>">Gerenciar usuários</a></li>
</ul>
</body>
</html>