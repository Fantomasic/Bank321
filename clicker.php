<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Clicker');
$app->initLayout('Centered');
$button=$app->add(['Button','Click','purple']);
if(!isset($_SESSION['flag'])){
$_SESSION['timer'] = time();
$_SESSION['click']= 0;
}
$now = time();
$_SESSION['t'] = $now - $_SESSION['timer'];
$button->on('click', function($action){
$_SESSION['click']=$_SESSION['click']+1;
  $_SESSION['flag']=true;
  if ($_SESSION['t'] > 15) {
    return new \atk4\ui\jsExpression('document.location="lose.php"');
  }
   if ($_SESSION['click'] < 20) {
     return $action->text($_SESSION['click']);
   }
  if (($_SESSION['t']<=15) and  ($_SESSION['click']==20)) {
    return new \atk4\ui\jsExpression('document.location="win.php"');
  }
});
