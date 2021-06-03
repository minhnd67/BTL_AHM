<?php
class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('Login');
    }

    public function index() {
        $data = [
            'title' => 'Home page',
        ];

        $this->view('index', $data);
    }

}
