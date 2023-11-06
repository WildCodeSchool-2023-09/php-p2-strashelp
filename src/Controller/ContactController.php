<?php

namespace App\Controller;

use App\Model\ContactManager;

class ContactController extends AbstractController
{
    public function contact(): string
    {
        $errors = [];
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentialsContact = array_map('trim', $_POST);
            $credentialsContact = array_map('htmlentities', $credentialsContact);

            if (!isset($credentialsContact['email']) || empty($credentialsContact['email'])) {
                $errors['email'] = 'champ obligatoire';
            }

            if (!isset($credentialsContact['firstname']) || empty($credentialsContact['firstname'])) {
                $errors['firstname'] = 'champ obligatoire';
            }

            if (!isset($credentialsContact['lastname']) || empty($credentialsContact['lastname'])) {
                $errors['lastname'] = 'champ obligatoire';
            }

            if (!isset($credentialsContact['message']) || empty($credentialsContact['message'])) {
                $errors['message'] = 'champ obligatoire';
            }

            if (empty($errors)) {

                $contactManager = new ContactManager();
                $contactManager->insert($credentialsContact);
            }
            
        }
        return $this->twig->render('Contact/contact.html.twig', ['errors' => $errors]);
    }
}
