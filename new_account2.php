<?php
session_start();
require 'connection.php';
$str = 'LV36ABRA';

for ($i = 1;$i<= 13;$i++){
$str = $str.rand(0,9);
}

$new_account = new Account($db);
$new_account['client_id'] = $_SESSION['id'];
$new_account['account_number'] = $str;
$new_account['balance'] = 0;
$new_account['currency'] = 'eur';
$new_account->save();

header('location: home.php');
