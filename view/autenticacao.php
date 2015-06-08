<?php
use \JonasRuth\NewsPucpr\UsuarioController;
if(isset($_POST['login']['email']) && isset($_POST['login']['senha'])){
    UsuarioController::autenticarAction($_POST['login']['email'],$_POST['login']['senha']);
    if(!UsuarioController::isLogged()){
        $mensagem_erro = 'Email ou senha incorretos. Tente novamente.';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>PUCPR News Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    -->

    <!-- Custom styles for this template -->
    <link href="<?php echo \JonasRuth\NewsPucpr\Application::getInstance()->getBaseURL() ?>css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <?php if(!\JonasRuth\NewsPucpr\UsuarioController::isLogged()): ?>

    <form class="form-signin" action="<?php $myRoute->getInstance()->createLink('login') ?>" method="post">
        <h2 class="form-signin-heading">Efetue seu login</h2>
        <?php if(!empty($mensagem_erro)): ?>
            <div class="alert alert-danger" role="alert">
                <strong>Ops!</strong> <?php echo $mensagem_erro?>
            </div>
        <?php endif; ?>
        <label for="inputEmail" class="sr-only">Endereço de email</label>
        <input type="email" id="inputEmail" name="login[email]" class="form-control" placeholder="Endereço de email" value="<?php echo !empty($_POST['login']['email']) ? $_POST['login']['email'] : '' ?>" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" name="login[senha]" class="form-control" placeholder="Senha" required>
        <!--<div class="checkbox">
            <label>
                <input type="checkbox" name="login[remember]" value="ok"> Lembrar-me
            </label>
        </div>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
    </form>
    <?php else: ?>
        <div class="form-signin">
            <h2 class="form-signin-heading">Olá, <?php echo \JonasRuth\NewsPucpr\UsuarioController::getLogged()['nome'] ?>!</h2>
            <a class="btn btn-lg btn-primary btn-block" href="<?php echo $myRoute->createLink('administracao') ?>">Administração</a>
            <a class="btn btn-lg btn-danger btn-block" href="<?php echo $myRoute->createLink('logout') ?>">Logout</a>
        </div>
    <?php endif; ?>

</div><!-- /container -->


</body>
</html>