<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Bank321');
$app->initLayout('Centered');
$client=new Client($db);
$client->load($_SESSION['id']);
$button=$app->add(['Button','Create new account','green']);
$button->on('click',function($button){
  $str = 'LV36ABRA';
  for ($i = 1;$i= 13;$i++){
  $str = $str. rand(0,9);
  }
  $new_account = new Account($db);
  $new_account->client_id = $_SESSION['id'];
  $new_account->number = $str;
  $new_account->balance = 0;
  $new_account->save();

  return true;
});
$account=$client->ref('Account');
$grid=$app->add('Grid');
$grid->setModel($account);
