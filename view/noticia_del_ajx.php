<?php

$sucesso = \JonasRuth\NewsPucpr\NoticiaController::deletarAction($myRoute->getParam('id'));

$out = array(
    'success' => $sucesso,
);

header('Content-Type: application/json');
echo json_encode($out);
exit(0);