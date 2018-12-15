<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Bank321');
$app->initLayout('Centered');
$crud=$app->add('CRUD');
$crud->setModel(new Client ($db));
$crud=$app->add('CRUD')
$crud->setModel(new Account ($db));
