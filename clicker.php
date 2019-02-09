<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Clicker');
$app->initLayout('Centered');

//$button->on('click', function($action){
    //return $action->text(rand(1,100));
//  });

if(!isset($_SESSION['flag'])){
$_SESSION['timer'] = time();

}
$now = time();
$_SESSION['t'] = $now - $_SESSION['timer'];

  if ($_SESSION['t']<=15)  ($_SESSION['click']==20) {
    $_SESSION['t']=0;
  }
  
$button=$app->add(['Button','Click','purple']);
$button->on('click', function($action){
  $_SESSION['click']=$_SESSION['click']+1;
  $_SESSION['flag']=true;
    return $action->text($_SESSION['t']);
});
