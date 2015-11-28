<?php
class Controller {
	private $model;

	public function __construct($model) {
		$this->model = $model;
	}

	public function render($mvc_action) {
		$this->model->render = $mvc_action;
	}
}