<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Clicker');
$app->initLayout('Centered');
$button=$app->add(['Button','Click','purple']);
//$button->on('click', function($action){
    //return $action->text(rand(1,100));
//  });
$button->on('click', function($action){
  $_SESSION['i']=$_SESSION['i']+1;
  return $action->text($_SESSION['i']);
});
if(!isset($_SESSION['timer'])){
$_SESSION['timer'] = time();

}
$now = time();
$_SESSION['t'] = $now - $_SESSION['timer'];
$button->on('click', function($action){
  $_SESSION['i']=$_SESSION['i']+1;
   return $action->text($_SESSION[t]);
});
