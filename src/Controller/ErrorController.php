<?php

namespace App\controller;

use App\Controller\AbstractController;

class ErrorController extends AbstractController
{
    public function Error()
    {
        return $this->twig->render("Error/Error.html.twig");
    }
}
