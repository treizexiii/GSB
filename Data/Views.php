<?php 

class Views
{
    public $Data;

    public function getView($model, $allData = [])
    {
        $this->Data = $allData;

        require_once 'Views/layouts/header.php';
        require_once 'Views/' . $model . '.php';
        require_once 'Views/layouts/footer.php';

        // require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'header.php';
        // require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $model . '.php';
        // require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'footer.php';
    }
}