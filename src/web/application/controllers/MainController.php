<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller {

    public function indexAction(){
        $this->view->render('F1 FAN SITE');
    }

    public function teams_rankingAction(){
        $this->view->render('Ranking Zespolow > F1 FAN SITE');
    }

    public function drivers_rankingAction(){
        $this->view->render('Ranking Kierowcow > F1 FAN SITE');
    }

    public function photosAction(){
        $this->view->layout = 'photos_layout';
        $this->view->render('Zdjecia > F1 FAN SITE');
    }

    public function contactAction(){
        $this->view->render('Kontakt > F1 FAN SITE');
    }


}