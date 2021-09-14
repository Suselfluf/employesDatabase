<?php

class IndexController extends Controller {

	private $pageTpl = "/model/api.php";
	


	public function __construct() {
		$this->model = new IndexModel();
	}


	public function index() {
	
	}



}