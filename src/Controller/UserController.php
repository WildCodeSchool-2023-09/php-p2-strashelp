<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function register()
    {
            $errorsRegister = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = array_map('trim', $_POST);

            if (!isset($credentials['email']) || empty($credentials['email'])) {
                $errorsRegister['email'] = 'Veuillez entrer votre mail';
            }

            if (!filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
                $errorsRegister['validatemail'] = 'Format mail incorrect';
            }

            if (!isset($credentials['password']) || empty($credentials['password'])) {
                $errorsRegister['password'] = 'Veuillez entrer votre mot de passe !';
            }

            if (!isset($credentials['username']) || empty($credentials['username'])) {
                $errorsRegister['username'] = 'Veuillez entrer votre pseudonyme';
            }

            if (!isset($credentials['birthdate']) || empty($credentials['birthdate'])) {
                $errorsRegister['birthdate'] = 'Veuillez entrer votre date de naissance';
            }

            if (!isset($credentials['firstname']) || empty($credentials['firstname'])) {
                $errorsRegister['firstname'] = 'Veuillez entrer votre prenom';
            }

            if (!isset($credentials['lastname']) || empty($credentials['lastname'])) {
                $errorsRegister['lastname'] = 'Veuillez entrer votre nom';
            }

            if (!isset($credentials['localisation']) || empty($credentials['localisation'])) {
                $errorsRegister['localisation'] = 'Veuillez entrer votre localisation';
            }

            if (!isset($credentials['phone_number']) || empty($credentials['phone_number'])) {
                $errorsRegister['phone_number'] = 'Veuillez entrer votre numero de telephone';
            }

            if ($errorsRegister) {
                return json_encode(['errorsRegister' => $errorsRegister]);
            }

            if (!$errorsRegister) {
                $userManager = new UserManager();
                if ($userManager->insert($credentials)) {
                    return json_encode(['status' => 'success', 'message_success_register' => 'Enregistrement réussi']);
                } else {
                    return json_encode(['status' => 'error', 'message_error_register' => 'erreur']);
                }
            }
        }
    }
}
