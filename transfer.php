<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Transfers');
$app->initLayout('Centered');

$client = new Client($db);
$client -> load($_SESSION['id']);
$sen=$client->ref('Account');
foreach ($sen as $s) {
    $a[] = $s['account_number'];
}

$m=new \atk4\data\Model();
$m-> addField('Sender',['enum'=>$a]);
$m-> addField('Receiver');
$m->addField('money');
$form = $app ->add(['Form']);
$form->setModel($m);

  $form->onSubmit(function($form) use($db){
  $bank1 = new Account($db);
  $bank2 = new Account($db);
  $cur =   new Currency($db);
  $bank1->loadBy('account_number',$form->model['sender']);
  $bank2->loadBy('account_number',$form->model['receiver']);
  $res1=$bank1['balance'];
  $res2=$bank2['balance'];
  if ($bank1['currency']==$bank2['currency']){
    $bank1['balance']= $bank1['balance']-$form->model['money'];
    $bank2['balance']= $bank2['balance']+$form->model['money'];

  }else{
    $bank1['balance']= $bank1['balance']-$form->model['money'];
    $sum = $form->model['money'];
    $cur->loadBy('currency',$bank1['currency']);
    $sum = $sum/$cur['coef'];
    $cur->loadBy('currency',$bank2['currency']);
    $sum = $sum*$cur['coef'];
    $bank2['balance']=$bank2['balance']+$sum;
  }
  $bank1->addHook('beforeSave',function($bank1) use($res1,$res2,$bank2){
    if ($bank1['balance']<0){
      $bank1['balance'] = $res1;
      $bank2['balance'] = $res2;
    }
  });
  $bank1->save();
  $bank2->save();
});
