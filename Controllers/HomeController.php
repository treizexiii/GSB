<?php

class HomeController extends Controller
{
    public function Index()
    {
        if (!isset($_SESSION['auth'])) {
            header("Location: login");
        } else {
            $this->getView('home');
        }
    }
}