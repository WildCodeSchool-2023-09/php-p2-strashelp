<?php

namespace App\Controller;

use Twig\Environment;
use App\Model\CategoryManager;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

/**
 * Initialized some Controller common features (Twig...)
 */
abstract class AbstractController
{
    protected Environment $twig;


    public function __construct()
    {
        $loader = new FilesystemLoader(APP_VIEW_PATH);
        $this->twig = new Environment(
            $loader,
            [
            'cache' => false,
            'debug' => true,
            ]
        );
        $this->twig->addExtension(new DebugExtension());
        $this->twig->addGlobal('session', $_SESSION);
        $this->twig->addGlobal('categories', $this->showCategory());
    }

    private function showCategory()
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();

        return $categories;
    }
}
