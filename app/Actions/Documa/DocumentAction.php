<?php

declare(strict_types=1);

namespace App\Actions\Documa;

class DocumentAction
{
    public function getAllDocumentGroupByStatus(): array
    {
        return [
            'totalDocument' => 100,
            'forReview' => 100,
            'Shared' => 100
        ];
    }
}
