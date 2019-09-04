<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

    public function loginAction(){
        $vars = $this->model->login_form();
        $this->view->render('Login', $vars);
    }

    public function registerAction(){
        $this->view->render('Rejestracja');

    }
    public function login_checkAction(){
        $message = $this->model->login_check();
        $this->view->message($message);
    }

    public function new_userAction(){
        $message = $this->model->new_user();
        $this->view->message($message);
    }

    public function logoutAction(){
        $message = $this->model->logout();
        $this->view->message($message);
    }

    public function my_galleryAction(){
        $vars =$this->model->show_chosen_images();
        if (is_string($vars) && $vars != ''){
            $this->view->message($vars);
        }else{
            $vars['route'] = $this->route['controller'] . '/' .$this->route['action'];
            $this->view->layout = 'images_layout';
            $this->view->render('My gallery', $vars);
        }

    }

    public function uncheck_imagesAction(){
        $message = $this->model->uncheck_images();
        $this->view->message($message);
    }

    public function private_imagesAction(){
        $vars =$this->model->show_private_images();
        if (is_string($vars) && $vars != ''){
            $this->view->message($vars);
        }else{
            $vars['route'] = $this->route['controller'] . '/my_images';
            $this->view->layout = 'images_layout';
            $this->view->render('My images', $vars);
        }
    }

}