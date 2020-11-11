<?php 

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        
        //Controller default kalo url kosong
        if($url == NULL){
            $url = [$this->controller];
        }

        //Controller Initialization
        if(file_exists('../app/controllers/' . $url[0] . '.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        //Method Initialization
        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //Parameter Initialization
        if(!empty($url)){
            $this->params = array_values($url);
        }

        //Run Controller, Method, dan Param
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL(){
        if(isset($_GET)){
            //Check apakah url kosong
            if(empty($_GET)){
                return NULL;
            }

            //Hapus / di belakang
            $url = rtrim($_GET['url'], '/');

            //Menghindari karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);

            //Pisahkan url menjadi array
            $url = explode('/', $url);
            return $url;
        } 
    }
}

?>