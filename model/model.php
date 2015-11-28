<?php
class Model {
	public $render;
	public $path;
	public function __construct($path) {
		$this->path   = $path;
		$this->render = 'app';
	}		
}