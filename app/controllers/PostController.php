<?php

class PostController {
    public function __construct()
    {
        echo "PostController loaded";
    }

    public function index() {
        echo "PostController#index";
    }

    public function about($id) {
        echo "PostController#about id=" . $id; 
    }
}