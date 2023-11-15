<?php

namespace App\controller;

use App\Controller\AbstractController;

class RepondreannonceController extends AbstractController
{
    public function repondreannonce()
    {
        return $this->twig->render("repondreannonce/repondreannonce.html.twig");
    }
}