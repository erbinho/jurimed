<?php
namespace Core;

class Language {
	private $l;
	private $ini;

	public function __construct(){
		global $config;
		//$this->l = $config['default_lang'];
		if(!empty($_SESSION['lang']) && file_exists('lang/'.$_SESSEION['lang'].'.ini')){
			$this->l = $_SESSION['lang'];
		}
	}

	public function getLang($word, $return = false){
		$text = $word;
		if(isset($this->ini[$word])){
			$text = $this->ini[$word];
		}
		if($return){
			return $text;
		}else{
			echo $text;
		}
	}
}