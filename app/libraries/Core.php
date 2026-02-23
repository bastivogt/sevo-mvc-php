<?php

/**
 * App Core Class
 * Creates URL and loads core controller
 * URL format: /controller/method/params
 */
class Core
{

    protected $controller_suffix = "Controller";
    protected $currentController = "Page";
    protected $currentMethod = "index";
    protected $params = [];



    public function __construct()
    {
        $abort = false;
        // print_r($this->getUrl());


        //$this->currentController = $this->currentController . $this->controller_suffix;

        if($this->getUrl()) {

            $url = $this->getUrl();
        }else {
            $url = [$this->currentController, $this->currentMethod];
        }


        $file = "../app/controllers/" . ucwords($url[0]) . $this->controller_suffix . ".php";







        if (file_exists($file)) {
            $this->currentController = ucwords($url[0]) . $this->controller_suffix;;
            unset($url[0]);
            //print_r($url);
        }else {
            $this->currentController .= $this->controller_suffix;
            $abort = true;
        }
        
        //dd($this->currentController);



        require APP_ROOT . "/controllers/" . $this->currentController . ".php";

        $class = $this->currentController;
        $this->currentController = new $class();

    


        if (!empty($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }else {
                $this->currentMethod = "page404";
            }
            
        }else {
            if(method_exists($this->currentController, "index") && $abort === false) {
                $this->currentMethod = "index";
            }else {
                $this->currentMethod = "page404";
            }
        }

        //echo $this->currentMethod;
        //print_r($url);

        $this->params = $url ? array_values($url) : [];

        //print_r($this->params);



        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    public function getUrl()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
        return false;
    }

}
