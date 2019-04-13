<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Bank321');
$app->initLayout('Centered');
$client = new Client($db);
$client -> load($_SESSION['id']);
$sen=$client->ref('Account');
foreach ($sen as $s) {
    $a[] = $s['account_number'];
}

$m=new \atk4\data\Model();
$m-> addField('number',['enum'=>$a]);
$m-> addField('summa');
$m->addField('on_how_much');
$form =$app->add('Form');
$form->setModel($m);
$form->onSubmit(function($form) use($db){
  $bank1 = new Account($db);
  $bank1->loadBy('account_number',$form->model['number']);
$credit=$form->model['summa']*(1+0.1*$form->model ['on_how_much']);
$bank1['credit_balance']=$bank1['credit_balance']+$credit;
$bank1['balance']=$bank1['balance']+$form->model['summa'];
$bank1->save();
});
