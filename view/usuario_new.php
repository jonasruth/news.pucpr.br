<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo \NewsPucpr\Application::getInstance()->getBaseURL() ?>css/styles.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body>
<h1>Cadastro de novo usuário</h1>

<form method="post" action="<?php echo $myRoute->createLink('salvar_usuario', array()); ?>">
    <p>Exibir aqui o formulário</p>

    <label for="" class="fieldLabel">Nome</label>
    <input id="" name="usuario[nome]" type="text" value=""/><br/>

    <label for="" class="fieldLabel">Email</label>
    <input id="" name="usuario[email]" type="text" value=""/><br/>

    <label for="" class="fieldLabel">Telefone</label>
    <input id="" name="usuario[telefone]" type="text" value=""/><br/>

    <label for="" class="fieldLabel">Senha</label>
    <input id="" name="usuario[senha]" type="text" value=""/><br/>

    <label for="" class="fieldLabel">Tipo</label>
    <input id="" name="usuario[tipo]" type="radio" value="E"/>
    <label for="" class="fieldLabel">Escritor</label>
    <input id="" name="usuario[tipo]" type="radio" value="A"/>
    <label for="" class="fieldLabel">Administrador</label><br/>

    <label for="" class="fieldLabel">Status</label>
    <input id="" name="usuario[status]" type="radio" value="A"/>
    <label for="">Ativo</label>
    <input id="" name="usuario[status]" type="radio" value="I"/>
    <label for="">Inativo</label><br/>

    <a href="<?php echo $myRoute->createLink('ger_usuarios', array()); ?>">cancelar</a>
    <button type="submit">Salvar</button>
</form>

</body>
</html>