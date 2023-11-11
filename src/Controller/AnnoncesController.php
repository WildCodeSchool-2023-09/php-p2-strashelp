<?php

namespace App\controller;

use App\Controller\AbstractController;

class AnnoncesController extends AbstractController
{
    public function annonces()
    {
        return $this->twig->render("annonces/_annonces.html.twig");
    }
}
