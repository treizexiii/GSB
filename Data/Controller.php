<?php

abstract class Controller extends Views
{
    public function getModel($model)
    {
        //include_once './Models/' . $model . '.php';
        include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . $model . '.php';
        $this->$model = new $model();
    }
}