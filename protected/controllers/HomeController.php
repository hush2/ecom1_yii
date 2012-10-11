<?php

class HomeController extends Controller
{
    public function actionIndex()
    {    
        $this->render('index');
    }

    public function actionAbout()
    {
        $this->render('about');
    }

    public function actionContact()
    {    
        $this->render('contact');
    }
}
