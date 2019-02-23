<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Win');
$app->initLayout('Centered');
$app -> add(['Header','You have won 50 EUR!']);
$image = $app->add(['Image','https://www.makeupandbeautyblog.com/wp-content/uploads/2012/01/circle-star-200x200.jpg']);
$menu = $app->add('Menu');
$sm = $menu->addMenu('Account');
$client = new Client($db);
$client -> load($_SESSION['id']);
$acc = $client->ref('Account');
$win = new Account($db);
foreach ($acc as $shot) {
  $sm->addItem($shot['account_number'])->on('click', function($action) use ($shot) {
    $shot['balance'] = $shot['balance'] + 50;
    $shot -> save();
    return new \atk4\ui\jsExpression('document.location="home.php"');
  });
}
