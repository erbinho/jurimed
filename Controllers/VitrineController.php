<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;

class VitrineController extends Controller {
	public function __construct(){
		parent::__construct();
	}

    public function index() {
    	$array = array('tpl' => 'siteVitrine/template');
     	$this->loadTemplate("siteVitrine/home", $array);
    }
}