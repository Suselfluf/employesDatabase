<?php

class Controller {

	public $model;
	protected $pageData = array();

	public function __construct() {
		$this->model = new Model();
	}	

}