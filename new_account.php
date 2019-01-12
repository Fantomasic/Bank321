<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('New Account');
$app->initLayout('Centered');
$account = new Account ($db);
$account->client_id = $_SESSION['id'];
$form =$app->add('Form');
$form->setModel($account);
$form->buttonSave->set('create account');
$button=$app->add(['Button','Back']);
$button->link(['home']);

$form->onSubmit(function($form){

});
