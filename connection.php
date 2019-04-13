<?php
require 'vendor/autoload.php';
$db = new
\atk4\data\Persistence_SQL('mysql:dbname=Bank321;host=localhost', 'root', '');
class Client extends \atk4\data\Model {
public $table = 'client';
function init() {
parent::init();
$this->addFields(['name','phone','username']);
$this->addField('password',['type'=>'password']);
$this->hasMany('Account',new Account);
}
}
class Account extends \atk4\data\Model {
public $table = 'account';
function init() {
parent::init();
$this->addField('balance',['type'=>'money']);
$this->addField('account_number');
$this->addField('currency');
$this->addField('credit_balance');
$this->hasOne('client_id',new Client)->addTitle();

}
}
class Currency extends \atk4\data\Model {
public $table = 'currency';
function init() {
parent::init();
$this->addField('currency');
$this->addField('coef');
}
}
