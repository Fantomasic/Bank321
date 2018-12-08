<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Bank321');
$app->initLayout('Centered');
$form=$app->add('Form');
$form->setModel(new Client($db));
$form->buttonSave->set('Create an account');
$form->onSubmit(function($form) {
  $form->model->save();
 return $form->success('Record updated');
});
$button=$app->add(['Button','Back']);
$button->link(['index']);
