<?php

class PageController extends Controller
{

    public function __construct()
    {
        echo "PageController loaded";
    }

    public function index() {
        return $this->view("page/index", [
            "title" => "Page Index"
        ]);
    }

    public function about() {
        //return $this->page404();
        return $this->view("page/about", [
            "title" => "About us ...",
            "content" => "<strong>The content ...</strong>"
        ]);
    }
}
