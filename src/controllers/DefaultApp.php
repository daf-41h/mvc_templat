<?php
use MyApp\Core\BaseController;

class DefaultApp extends BaseController {

  public function index() {
    $data = [
      'title' => 'Home'
    ];
    $this->view('template/header', $data);
    $this->view('home/index');
    $this->view('template/footer');
  }
}