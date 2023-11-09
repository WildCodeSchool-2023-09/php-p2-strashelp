<?php

namespace App\controller;

use App\Controller\AbstractController;

class DepotController extends AbstractController
{
    public function deposeruneannonce()
    {
        return $this->twig->render("deposeruneannonce/deposeruneannonce.html.twig");
    }
}
