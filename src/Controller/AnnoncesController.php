<?php

namespace App\controller;

use App\Controller\AbstractController;
use app\Model\AnnonceManager;
class AnnoncesController extends AbstractController
{
    public function annonces()
    {
        return $this->twig->render("annonces/_annonces.html.twig");
    }
    public function delete($id)
  {
   $annonceManager = new AnnonceManager(); 
   $annonceManager->delete($id);
   
    header('location:/annonces');
  }  
}
