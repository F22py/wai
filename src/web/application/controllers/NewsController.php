<?php

namespace application\controllers;

use application\core\Controller;

class NewsController extends Controller {

    public function firstAction(){
        $this->view->render('1st news > F1 FAN SITE');
    }
    public function secondAction(){
        $this->view->render('2nd news > F1 FAN SITE');
    }
    public function second_newAction(){
        $this->view->render('2nd news > F1 FAN SITE');
    }
    public function thirdAction(){
        $this->view->render('3rd news > F1 FAN SITE');
    }

}