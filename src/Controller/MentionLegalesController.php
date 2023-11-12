<?php

namespace App\controller;

use App\Controller\AbstractController;

class MentionLegalesController extends AbstractController
{
    public function mentionlegales()
    {
        return $this->twig->render("mentionlegales/mentionlegales.html.twig");
    }
}
