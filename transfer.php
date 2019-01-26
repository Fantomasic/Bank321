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
  $res1=$bank1['balance'];
  $res2=$bank2['balance'];
  $bank1['balance']= $bank1['balance']-$form->model['money'];
  $bank2['balance']= $bank2['balance']+$form->model['money'];
  $bank1->addHook('beforeSave',function($bank1) use($res1,$res2,$bank2){
    if ($bank1['balance']<0){
      $bank1['balance'] = $res1;
      $bank2['balance'] = $res2;
    }
  });
  $bank1->save();
  $bank2->save();
});
