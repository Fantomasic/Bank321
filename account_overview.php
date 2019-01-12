<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Bank321');
$app->initLayout('Centered');
$number=new account($db);
$number->load($_GET['number_id']);
$button=$app->add(['Button','transfer','green']);
$button->link(['transfer.php']);
