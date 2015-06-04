<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var dialog;

            $('.record-delete').on('click', function (e) {
                e.preventDefault();
                if (!confirm('Deseja realmente excluir?')) {
                    return;
                }
                ;

                var este = this;
                $.ajax({
                    url: '<?php echo $myRoute->createLink('del_usuario_ajx', array()); ?>',
                    data: {id: $(este).data('id')},
                    dataType: 'json',
                    type: 'GET',
                    success: function (resposta) {
                        if (resposta.success == true) {
                            alert('ok');
                        } else {
                            alert(resposta);
                        }
                    }
                });
            });

            function addUser() {
                alert('ok');
            }

            dialog = $("#dialog-form").dialog({
                autoOpen: false,
                height: 300,
                width: 350,
                modal: true,
                buttons: {
                    "Create an account": addUser,
                    Cancel: function () {
                        dialog.dialog("close");
                    }
                },
                close: function () {
                    form[ 0 ].reset();
                    //allFields.removeClass("ui-state-error");
                }
            });

            $("#new-usuario").button().on("click", function () {
                dialog.dialog("open");
            });

            form = dialog.find( "form" ).on( "submit", function( event ) {
                event.preventDefault();
                addUser();
            });

        });
    </script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo \NewsPucpr\Application::getInstance()->getBaseURL() ?>css/styles.css">
    <style>
        body {
            font-size: .8em;
        }

        /*label, input {
            display: block;
        }*/

        input.text {
            margin-bottom: 12px;
            width: 95%;
            padding: .4em;
        }

        fieldset {
            padding: 0;
            border: 0;
            margin-top: 25px;
        }

        h1 {
            font-size: 1.2em;
            margin: .6em 0;
        }

        div#users-contain table {
            margin: 1em 0;
            border-collapse: collapse;
            width: 100%;
        }

        div#users-contain table td, div#users-contain table th {
            border: 1px solid #eee;
            padding: .6em 10px;
            text-align: left;
        }

        .ui-dialog .ui-state-error {
            padding: .3em;
        }

    </style>
</head>
<body>
<h1>Usuários</h1>

<a href="<?php echo $myRoute->createLink('new_usuario',array()); ?>">Novo</a>

<?php
use NewsPucpr\UsuarioController;

UsuarioController::listarAction();
?>

</body>

</html>