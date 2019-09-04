<?php

namespace application\core;

class View{

    public $path;
    public $layout = 'default';
    public $route;


    public function __construct($route){
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];

    }

    public function render($title, $vars=[]){
        extract($vars);
        if (file_exists('application/views/'.$this->path.'.php')){
            ob_start();
            require 'application/views/'.$this->path.'.php';
            $content = ob_get_clean();
            require 'application/views/layouts/'.$this->layout.'.php';
        } else {
            echo 'View was not found '. $this->path;
        }
    }

    public function redirect($url) {
        header('location: /'.$url);
        exit;
    }

    public function message($msg){
        $this->path = 'message/msg';
        $vars= [
            'message' => $msg,
        ];
        $this->render('Message > F1 FUN SITE', $vars );
        exit;
    }

    public static function errorCode($code) {
        http_response_code($code);
        $path = 'application/views/errors/'.$code.'.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }

}