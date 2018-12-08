<?php
session_start();
require 'connection.php';
$app = new \atk4\ui\App('Bank321');
$app->initLayout('Centered');
$client=new Client($db);
$form =$app->add('Form');
$form->setModel(new Client ($db),['username','password']);
$form->buttonSave->set('Sign in');
$form->onSubmit(function($form) use($client){
		$client->tryLoadBy('username',$form->model['username']);
		if($client['password']==$form->model['password']){
			$_SESSION['id']=$client->id;
			return new \atk4\ui\jsExpression('document.location="home.php"');


		}else{
			$client->unload();
			$er = new \atk4\ui\jsNotify('No such user.');
			$er->setColor('red');
			return $er;


		}
});
$button=$app->add(['Button','Sign up','green']);
$button->link(['reg']);
