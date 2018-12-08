<?php
require 'vendor/autoload.php';
$db = new
\atk4\data\Persistence_SQL('mysql:dbname=heroku_33a09646a43f60a;host=eu-cdbr-west-02.cleardb.net', 'b40ba71796d5af', 'a0bf7181');
lass Client extends \atk4\data\Model {
public $table = 'client';
function init() {
parent::init();
$this->addFields(['name','phone','username']);
$this->addField('password',['type'=>'password']);
$this->hasMany('Friends',new Friends);
