<?php

class RegisterController extends Controller
{
    public $errors = [];

    public function index()
    {
        $this->getModel('User');

        if (isset($_POST['send'])) {
            $this->checkForm($_POST);
            if (empty($this->errors)) {
                if (!$this->User->checkEmail($_POST['email'])) {
                    $data = [
                        "firstName" => $_POST['firstName'],
                        "lastName" => $_POST['lastName'],
                        "email" => $_POST['email'],
                        "password" => password_hash($_POST['password'], PASSWORD_BCRYPT)
                    ];
                    $this->User->createUser($data);
                    header("Location:home");
                } else {
                    $this->errors['email'] = "L'e-mail est déjà utilisé.";
                }
            }
        }
        $this->getView('register', $this->errors);
        unset($this->errors);
    }

    public function checkForm($data)
    {
        if (empty($data['firstName'])) {
            $this->errors['firstName'] = "Le champs prenom doit être renseigné.";
        }
        if (empty($data['lastName'])) {
            $this->errors['lastName'] = "Le champs nom doit être renseigné.";
        }
        if (empty($data['email'])) {
            $this->errors['email'] = "Le champs e-mail doit être renseigné.";
        }
        if (empty($data['password'])) {
            $this->errors['password'] = "Le champs mot de passe doit être renseigné.";
        }
    }
}
