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
<?php $usuario = \NewsPucpr\UsuarioDAO::find($myRoute->getParam('id')) ?>
<h1>Edição do usuário <?php echo \NewsPucpr\UsuarioDAO::find($myRoute->getParam('id'))->nome ?></h1>

<form method="post" action="<?php echo $myRoute->createLink('salvar_usuario', array()); ?>">
    <p>Exibir aqui o formulário</p>

    <input id="" name="usuario[id]" type="hidden" value="<?php echo $usuario->id?>"/>

    <label for="" class="fieldLabel">Nome</label>
    <input id="" name="usuario[nome]" type="text" value="<?php echo $usuario->nome?>"/><br/>

    <label for="" class="fieldLabel">Email</label>
    <input id="" name="usuario[email]" type="text" value="<?php echo $usuario->email?>"/><br/>

    <label for="" class="fieldLabel">Telefone</label>
    <input id="" name="usuario[telefone]" type="text" value="<?php echo $usuario->telefone?>"/><br/>

    <label for="" class="fieldLabel">Senha</label>
    <input id="" name="usuario[senha]" type="text" value="<?php echo $usuario->senha?>"/><br/>

    <label for="" class="fieldLabel">Tipo</label>
    <input id="" name="usuario[tipo]" type="radio" value="E" <?php echo $usuario->tipo ==='E' ? 'checked="checked':'' ?>/>
    <label for="" class="fieldLabel">Escritor</label>
    <input id="" name="usuario[tipo]" type="radio" value="A" <?php echo $usuario->tipo ==='A' ? 'checked="checked':'' ?>/>
    <label for="" class="fieldLabel">Administrador</label><br/>

    <label for="" class="fieldLabel">Status</label>
    <input id="" name="usuario[status]" type="radio" value="A" <?php echo $usuario->status ==='A' ? 'checked="checked':'' ?>/>
    <label for="">Ativo</label>
    <input id="" name="usuario[status]" type="radio" value="I" <?php echo $usuario->status ==='I' ? 'checked="checked':'' ?>/>
    <label for="">Inativo</label><br/>

    <a href="<?php echo $myRoute->createLink('ger_usuarios', array()); ?>">cancelar</a>
    <button type="submit">Salvar</button>
</form>

</body>
</html>