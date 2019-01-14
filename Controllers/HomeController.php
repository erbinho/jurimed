<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;

class HomeController extends Controller {
	public function __construct(){
		parent::__construct();
	}

    public function index() {
    	$array = array('tpl' => 'siteHome/template');
     	$this->loadTemplate("siteHome/home", $array);
    }

    public function contato() {
    	echo "kkk";
    }
}