<?php

use JonasRuth\NewsPucpr\NoticiaController;

?>
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

            <h2 class="sub-header">Listagem <a class="btn btn-sm btn-success" href="<?php echo $myRoute->createLink('new_noticia',array()); ?>">Cadastrar nova notícia</a></h2>


            <div class="table-responsive">

                <?php NoticiaController::listarAction(); ?>

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

            if (!confirm('Deseja realmente excluir esta notícia?')) {
                return;
            }

            $.ajax({
                url: '<?php echo $myRoute->createLink('del_noticia_ajx', array()); ?>',
                data: {id: registro},
                dataType: 'json',
                type: 'GET',
                success: function (resposta) {
                    if (resposta.success == true) {
                        $('#noticias_row_'+registro).hide();
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
