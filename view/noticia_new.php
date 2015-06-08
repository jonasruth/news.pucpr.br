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
            <h1 class="page-header">Notícias</h1>

            <h2 class="sub-header">Cadastro</h2>

            <form method="post" action="<?php echo $myRoute->createLink('salvar_noticia', array()); ?>">

                <label for="noticia[titulo]" class="fieldLabel">Título</label>
                <input id="noticia[titulo]" name="noticia[titulo]" type="text" value=""/><br/>

                <label for="noticia[subtitulo]" class="fieldLabel">Subtítulo</label>
                <input id="noticia[subtitulo]" name="noticia[subtitulo]" type="text" value=""/><br/>

                <label for="noticia[texto]" class="fieldLabel">Texto</label>
                <textarea id="noticia[texto]" name="noticia[texto]"></textarea><br/>

                <label for="noticia[status]A" class="fieldLabel">Status</label>
                <input id="noticia[status]A" name="noticia[status]" type="radio" value="A"/>
                <label for="noticia[status]A">Ativo</label>
                <input id="noticia[status]I" name="noticia[status]" type="radio" value="I"/>
                <label for="noticia[status]I">Inativo</label><br/>

                <p class="buttonGroup">
                    <a class="btn btn-lg btn-link" href="<?php echo $myRoute->createLink('ger_noticias', array()); ?>">cancelar</a>
                    <button class="btn btn-lg btn-success" type="submit">Salvar</button>
                </p>
            </form>

        </div>
    </div>
</div>

<?php include('html_include/adm-scripts.html'); ?>

</body>
</html>
