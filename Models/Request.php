<?php

class Request
{
    public $request = [];

    function __construct($post)
    {
        foreach ($post as $index => $value) {
            $this->request[$index] = $value;
        }
    }
}