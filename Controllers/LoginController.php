<?php

class LoginController extends Controller
{
    public $errors = [];

    public function index()
    {
        $auth = false;
        
        $this->getModel('User');

        if (isset($_POST['log'])) {
            $this->checkForm($_POST);
            if (empty($this->errors)) {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $user = $this->User->checkEmail($login);
                if (empty($user)) {
                    $this->errors['user'] = "Utilisateur inconnu";
                } else {
                    if($this->User->checkPassword($login, $password)) {
                        $auth = true;
                    } else {
                        $this->errors['passVerif'] = 'mot de passe incorrect';
                    }
                }
            }
        }
        if ($auth == true) {
            $infosUser = $this->User->setUser($user['email']);
            Session::set('auth', $infosUser);
            header("Location:home");
        }
        $this->getView('login', $this->errors);
        unset($this->errors);
    }

    public function checkForm($data)
    {
        if (empty($data['login'])) {
            $this->errors['login'] = "L'e-mail doit être renseigné.";
        }
        if (empty($data['password'])) {
            $this->errors['password'] = "Le mot de passe doit être renseigné.";
        }
    }
}
