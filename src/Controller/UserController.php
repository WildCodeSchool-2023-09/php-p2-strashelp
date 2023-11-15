<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function login(): string
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = array_map('trim', $_POST);
            $credentials = array_map('htmlentities', $credentials);

            if (!isset($credentials['identifiant']) || empty($credentials['identifiant'])) {
                $errors['identifiant'] = 'Veuillez rentrer votre pseudo ou adresse mail.';
            }

            if (!isset($credentials['password']) || empty($credentials['password'])) {
                $errors['password'] = 'Veuillez saisir votre mot de passe.';
            }

            if (empty($errors)) {
                $userManager = new UserManager();
                $users = $userManager->selectOneByIdentifiant($credentials['identifiant']);

                if ($users && password_verify($credentials['password'], $users['password'])) {
                    $_SESSION['user_id'] = $users['id'];
                    header('Location: /login');
                    exit();
                } else {
                    echo 'Mdp invalide';
                }
            }
        }
        return $this->twig->render('Home/index.html.twig', ['errors' => $errors]);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location : /');
    }
    public function delete($id)
    {
        $userManager = new UserManager();
        $userManager->delete($id);

        header('location:/user');
    }
}
