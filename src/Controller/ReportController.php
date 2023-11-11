<?php

namespace App\Controller;

use App\Model\ReportManager;

class ReportController extends AbstractController
{
    public function showReports()
    {
        $reportManager = new ReportManager();
        $reports = $reportManager->selectAll('title');

        return $this->twig->render('Item/index.html.twig', ['reports' => $reports]);
    }
}
