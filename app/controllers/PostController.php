<?php

class PostController extends Controller
{
    private $postModel;
    public function __construct()
    {
        echo "PostController loaded";
        $this->postModel = $this->model("Post");
    }

    public function index()
    {
        echo "PostController#index";
        return $this->view("post/index", [
            "title" => "All posts",
            "posts" => $this->postModel->getPosts(true)
        ]);
    }

    public function show($id) {
        $post = $this->postModel->getPost($id);
        if(! $post) {
            return $this->page404();
        }
        return $this->view("post/show", [
            "title" => $post->title,
            "post" => $post
        ]);
    }
}
