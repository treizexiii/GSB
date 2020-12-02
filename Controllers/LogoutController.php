<?php

class LogoutCOntroller extends Controller
{
    public function logout()
    {
        Session::endSession();
        header("Location:home");
    }
}