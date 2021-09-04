<?php 

class Controller{

	public function view($view, $data = [])
	{
		require_once '../app/views/' . $view . '.php';
		// var_dump($data);
	}

	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model;
	}

}


