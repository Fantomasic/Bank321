<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Money');
$app->initLayout('Centered');
