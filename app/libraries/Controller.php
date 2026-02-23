<?php

class Controller
{

    public function model($model)
    {
        // $file = "../app/models/" . $model . ".php";
        $file = APP_ROOT . "/models/" . $model . ".php";
        if (file_exists($file)) {
            require_once $file;
            return new $model();
        }
        return false;
    }


    public function view($view, $data = [])
    {
        // $file = "../app/views/" . $view . ".php";
        $file = APP_ROOT . "/views/" . $view . ".php";

        if (file_exists($file)) {
            extract($data);
            require_once $file;
        }else {
            die("View file: $view not found.");
        }
    }

    public function extend() {
        echo "EXTEND";
    }


    public function getTemplatePart($tpl, $dir = "") {
        // $file = "../app/views/" . $dir . "/" . $tpl . ".php";
        $file = APP_ROOT . "/views/" . $dir . "/" . $tpl . ".php";
        if(file_exists($file)) {
            require $file;
        }else {
            die("Template does not exist.");
        }
    }

    public function getHeader($title = "") {
        // $file = "../app/views/inc/header.php";
        $file = APP_ROOT . "/views/inc/header.php";
        if(file_exists($file)) {
            require_once $file;
        }else {
            die("Header does not exist.");
        }
    }

    public function getFooter() {
        // $file = "../app/views/inc/footer.php";
        $file = APP_ROOT . "/views/inc/footer.php";
        if(file_exists($file)) {
            require_once $file;
        }else {
            die("Footer does not exist.");
        }
    }

    public function getSidebar() {
        // $file = "../app/views/inc/sidebar.php";
        $file = APP_ROOT . "/views/inc/sidebar.php";
        if(file_exists($file)) {
            require_once $file;
        }else {
            die("Sidebar does not exist.");
        }
    }



    public function page404($tpl = "404") {
        header("HTTP/1.1 404 Not Found");
        return $this->view("404");
    }
}
