<?php

class PostController extends Controller
{
    private $postModel;
    public function __construct()
    {
        echo "PostController loaded";
        $this->postModel = $this->model("Post");
    }


    private function getPostOr404($id) {
        $post = $this->postModel->getPost($id);
        if(! $post) {
            return $this->page404();
        }
        return $post;
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

    public function new() {
        $this->postModel->createPost("Hello", "Hello, world!");
        return "Post created";
    }

    public function delete($id) {
        $post = $this->postModel->getPost($id);
        if(!$post) {
            return $this->page404();
        }
        $this->postModel->deletePost($id);
        return "DELETED";
    }

    public function update($id) {
        $post = $this->postModel->getPost($id);
        if(!$post) {
            return $this->page404();
        }

        $this->postModel->updatePost($id, "Hello", "Hello, world!");
        return "UPDATED";


    }
}
