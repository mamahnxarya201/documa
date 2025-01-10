<?php

namespace App\Service;

use App\Repository\DocumentRepository;

class DocumentService
{
    public function __construct
    (
        private DocumentRepository $documentRepository
    ){}
}