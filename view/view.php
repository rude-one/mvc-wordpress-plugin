<?php
class View {
	private $model;
	
	public function __construct($model) {
		$this->model = $model;
	}
	
	public function output() {
		$file = $this->model->path . 'web/templates/' . $this->model->render . '.html';
        if(is_file($file)) {
            include_once $file;
        } else {
	        include_once $this->model->path . 'web/templates/app.html';
        }
	}
	
}