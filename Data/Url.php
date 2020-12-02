<?php

class Url
{
    public static $url;

    public function getUrl()
    {
        $this->Url = $_REQUEST['HTTP_HOST'] . '/';
    }
}