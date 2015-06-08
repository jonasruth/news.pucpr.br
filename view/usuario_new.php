<!DOCTYPE html>
<head>
    <title>Dashboard Template for Bootstrap</title>

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
            <h1 class="page-header">Usuários</h1>

            <h2 class="sub-header">Cadastro</h2>

            <form method="post" action="<?php echo $myRoute->createLink('salvar_usuario', array()); ?>">

                <label for="usuario[nome]" class="fieldLabel">Nome</label>
                <input id="usuario[nome]" name="usuario[nome]" type="text" value=""/><br/>

                <label for="usuario[email]" class="fieldLabel">Email</label>
                <input id="usuario[email]" name="usuario[email]" type="text" value=""/><br/>

                <label for="usuario[telefone]" class="fieldLabel">Telefone</label>
                <input id="usuario[telefone]" name="usuario[telefone]" type="text" value=""/><br/>

                <label for="usuario[senha]" class="fieldLabel">Senha</label>
                <input id="usuario[senha]" name="usuario[senha]" type="text" value=""/><br/>

                <label for="usuario[tipo]E" class="fieldLabel">Tipo</label>
                <input id="usuario[tipo]E" name="usuario[tipo]" type="radio" value="E"/>
                <label for="usuario[tipo]E">Escritor</label>
                <input id="usuario[tipo]A" name="usuario[tipo]" type="radio" value="A"/>
                <label for="usuario[tipo]A">Administrador</label><br/>

                <label for="usuario[status]A" class="fieldLabel">Status</label>
                <input id="usuario[status]A" name="usuario[status]" type="radio" value="A"/>
                <label for="usuario[status]A">Ativo</label>
                <input id="usuario[status]I" name="usuario[status]" type="radio" value="I"/>
                <label for="usuario[status]I">Inativo</label><br/>

                <p class="buttonGroup">
                    <a class="btn btn-lg btn-link" href="<?php echo $myRoute->createLink('ger_usuarios', array()); ?>">cancelar</a>
                    <button class="btn btn-lg btn-success" type="submit">Salvar</button>
                </p>
            </form>

        </div>
    </div>
</div>

<?php include('html_include/adm-scripts.html'); ?>

</body>
</html>
