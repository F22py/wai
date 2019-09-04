<?php

namespace application\controllers;

use application\core\Controller;

class GalleryController extends Controller {

    public function indexAction(){
        $vars = $this->model->showPictures();
        $vars['route'] = $this->route['controller'] . '/' .$this->route['action'];
        $this->view->layout = 'images_layout';
        $this->view->render('Galeria', $vars);
    }

    public function formAction(){
        $vars = $this->model->access_control();
        $this->view->render('Przesyłanie nowych zdjęc', $vars);
    }

    public function uploadAction()
    {
        $message = $this->model->uploadPicture();
        $this->view->message($message);

    }

    public function images_redirectAction(){
        $this->view->redirect('./images');
    }

    public function chosenAction(){
        $message = $this->model->chosen_images();
        $this->view->message($message);
    }

    public function searchAction(){
        $this->view->render('Wyszukiwanie zdjęć');
    }

    public function live_searchAction(){
        $vars = $this->model->live_search();
        $this->view->layout = 'empty';
        $this->view->render('', $vars);
    }
}