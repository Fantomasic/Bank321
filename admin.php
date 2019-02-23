<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Bank321');
$app->initLayout('Centered');
$crud1=$app->add('CRUD');
$crud1->setModel(new Client ($db));
$crud2=$app->add('CRUD');
$crud2->setModel(new Account ($db));
$crud3=$app->add('CRUD');
$crud3->setModel(new Currency($db));
