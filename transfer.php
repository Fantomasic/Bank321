<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Transfers');
$app->initLayout('Centered');
$form =$app->layout->add('Form');
$form->addField('sender');
$form->addField('receiver');
$form->addField('money');
  $form->onSubmit(function($form) use($db){
  $bank1 = new Account($db);
  $bank2 = new Account($db);
  $bank1->loadBy('account_number',$form->model['sender']);
  $bank2->loadBy('account_number',$form->model['receiver']);
  $bank1['balance']= $bank1['balance']-$form->model['money'];
  $bank2['balance']= $bank2['balance']-$form->model['money'];
  $bank1->save();
  $bank2->save();
});
