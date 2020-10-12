<?php

namespace App\Controller;
use Core\Controller\Controller;
use \App;

class AppController extends Controller{

    protected $template = 'default';

    public function __construct(){
        $this->viewPath = ROOT . '/app/Views/';
    }

    public function loadModel($modelName){
        $this->$modelName = App::getInstance()->getTable($modelName);

    }

}