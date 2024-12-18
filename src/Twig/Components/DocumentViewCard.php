<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent('document_view_card')]
class DocumentViewCard
{
    public string $name;
    public string $author;
    public string $status;
    public int $totalFiles;
    public array $tags;
    public array $sharedTo;
}