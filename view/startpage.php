<?php

use JonasRuth\NewsPucpr\NoticiaController;

?>
<!DOCTYPE html>
<html>
<head>
    <title>PUCPR News</title>
    <meta charset="utf-8">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- BOOTSTRAP Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo \JonasRuth\NewsPucpr\Application::getInstance()->getBaseURL() ?>css/blog.css">
</head>
<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="<?php echo $myRoute->createLink('startpage'); ?>">Notícias</a>
            <a class="blog-nav-item" href="<?php echo $myRoute->createLink('administracao'); ?>">Administração</a>
        </nav>
    </div>
</div>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title"><a href="<?php echo $myRoute->createLink('startpage'); ?>">PUCPR News</h1>
        <p class="lead blog-description">O site de notícias do curso de AppDev por Jonas Ruth</p>


        <div class="row">
            <div class="col-sm-8 blog-main">

                <?php NoticiaController::listarPublicoAction(); ?>

                <!--<nav>
                    <ul class="pager">
                        <li><a href="#">Previous</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </nav>-->
            </div><!-- /.blog-main -->

            <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                <?php include('html_include/about.html') ?>
                <?php include('html_include/outras-coisas.php') ?>
            </div><!-- /.blog-sidebar -->


        </div><!-- /.row -->
    </div><!-- /.container -->

    <footer class="blog-footer">
        <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- BOOTSTRAP Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>