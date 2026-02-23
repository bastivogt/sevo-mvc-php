<?php

class BaseController extends Controller
{

    public function index() {
        return $this->view("home/index", [
            "title" => "Home"
        ]);
    }
}