<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Transfers');
$app->initLayout('Centered');
$number=new account($db);
$number->load($_GET['number_id']);

$image = $app->add(['Image','https://raschetniy-schet.ru/wp-content/uploads/2017/02/kak-sostavit-raspisku.jpg','big']);

$app->add(['ui'=>'hidden divider']);

$button=$app->add(['Button','transfer','green']);
$button->link(['transfer']);
