<?php
namespace Core;

class Controller {
	protected $lang;

	public function __construct(){
		global $config;
		$this->lang = new Language();
	}

	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		include 'Views/'.$viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = array()) {
		include 'Views/'.$viewData['tpl'].'.php';
	}

	public function loadViewInTemplate($viewName, $viewData) {
		extract($viewData);
		include 'Views/'.$viewName.'.php';
	}

}