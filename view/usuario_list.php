<?php

use NewsPucpr\UsuarioController;

?>
<!DOCTYPE html>
<head>
    <title>Dashboard Template for Bootstrap</title>

    <?php include('html_include/adm-header.html'); ?>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PUCPR News - Administração</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <?php echo \NewsPucpr\MenuAdm::create() ?>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Usuários</h1>

            <h2 class="sub-header">Listagem <a class="btn btn-sm btn-success" href="<?php echo $myRoute->createLink('new_usuario',array()); ?>">Cadastrar novo usuário</a></h2>


            <div class="table-responsive">

                <?php UsuarioController::listarAction(); ?>

            </div>
        </div>
    </div>
</div>

<?php include('html_include/adm-scripts.html'); ?>

<script type="text/javascript">
    jQuery(document).ready(function ($) {

        $('.record-delete').on('click', function (e) {
            e.preventDefault();
            var registro = $(this).data('id');

            if (!confirm('Deseja realmente excluir este usuário?')) {
                return;
            }
            ;

            $.ajax({
                url: '<?php echo $myRoute->createLink('del_usuario_ajx', array()); ?>',
                data: {id: registro},
                dataType: 'json',
                type: 'GET',
                success: function (resposta) {
                    if (resposta.success == true) {
                        $('#usuarios_row_'+registro).hide();
                    } else {
                        alert(resposta);
                    }
                }
            });
        });

    });
</script>
</body>
</html>
