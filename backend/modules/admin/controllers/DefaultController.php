<?php

namespace backend\modules\admin\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        //$this->layout = 'column2';
        return $this->render('index');
        
    }
}
