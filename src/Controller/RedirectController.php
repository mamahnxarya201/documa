<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;

class RedirectController extends AbstractController
{
    #[Route('/', name: 'redirect_document_list')]
    public function redirectToDocumentList(): RedirectResponse
    {
        return $this->redirectToRoute('app_document_list');
    }
}