<?php

namespace App\controller;

use App\Controller\AbstractController;

class ContactController extends AbstractController
{
    public function contact()
    {
        return $this->twig->render("contact/contact.html.twig");
    }
}
