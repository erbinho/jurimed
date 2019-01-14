<?php
namespace Controllers;

use \Core\Controller;

class NotfoundController extends Controller {
	public function __construct(){
		parent::__construct();
	}
    public function index() {
    	$array = array();
     	$this->loadView("404", $array);
    }
}