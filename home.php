<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Bank321');
$app->initLayout('Centered');
$client=new Client($db);
$client->load($_SESSION['id']);
$account=$client->ref('Account');
$grid=$app->add('Grid');
$grid->setModel($account);
//$grid->addDecorator('name',new \atk4\ui\TableColumn\Link('din.php?friends_id={$id}'));
