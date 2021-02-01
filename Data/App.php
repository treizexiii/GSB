<?php

class App
{
    public static $root;
    
    public function __construct($rootPath)
    {
        self::$root = $rootPath;
    }
}