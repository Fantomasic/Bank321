<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Money');
$app->initLayout('Centered');
$client=new Client($db);
$client->load($_SESSION['id']);
$friend=$client->ref('Friends');
$crud=$app->add('CRUD');
$crud->setModel($friend,['name','phone','email']);
$crud->addDecorator('name',new \atk4\ui\TableColumn\Link('din.php?friends_id={$id}'));
