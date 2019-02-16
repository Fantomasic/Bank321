<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Lose');
$app->initLayout('Centered');
$header=$app->add('Header','You lose!')
$image = $app->add(['Image','https://previews.123rf.com/images/chrisdorney/chrisdorney1310/chrisdorney131000156/22629187-you-lose-rubber-stamp-over-a-white-background-.jpg']);
