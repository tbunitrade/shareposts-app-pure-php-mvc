<?php

class Pages extends Controller {
    public function __construct() {

    }

    public function index() {
        $data = [
            'title' => 'Shareposts',
            'description' => 'Simple social network, loren ipsum description simple text'
        ];

        $this->view('pages/index',$data);
    }

    public function  about() {
        $data = [
            'title' => 'About Us page',
            'description'=> 'this is app to share posts to another users'
        ];

        $this->view('pages/about',$data);
    }
}