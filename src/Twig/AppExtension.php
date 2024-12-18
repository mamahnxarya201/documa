<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('statusClass', [$this, 'statusClassFilter']),
        ];
    }

    public function statusClassFilter($statusClass): array
    {
        return match ($statusClass) {
            'Approved' => ['bg' => '#C8E6C9', 'fg' => '#388E3C'],
            'Published' => ['bg' => '#BBDEFB', 'fg' => '#1976D2'],
            'For Review' => ['bg' => '#FFE0B2', 'fg' => '#F57C00'],
            'Rejected' => ['bg' => '#FFCDD2', 'fg' => '#D32F2F'],
            'Need Rework' => ['bg' => '#FFF9C4', 'fg' => '#FBC02D'],
            default => ['bg' => '#E0E0E0', 'fg' => '#757575'],
        };
    }
}
