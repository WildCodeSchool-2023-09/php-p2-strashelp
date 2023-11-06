<?php

namespace App\Controller;

use App\Model\AnnonceManager;

class AnnonceController extends AbstractController
{
    public function annonce(): string
    {
        $annoncesList = new AnnonceManager();
        $annonces = $annoncesList->selectAll();

        return $this->twig->render('Annonce/card.html.twig', ['annonces' => $annonces]);
    }
}
