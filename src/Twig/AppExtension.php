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
            new TwigFilter('roleClass', [$this, 'roleClassFilter']),
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

    public function roleClassFilter(int $role): array
    {
        return match ($role) {
            1 => ['bg' => '#E3F2FD', 'fg' => '#1E88E5'],  // Very Light Blue / Medium Blue
            2 => ['bg' => '#F3E5F5', 'fg' => '#8E24AA'],  // Very Light Purple / Medium Purple
            3 => ['bg' => '#FFF3E0', 'fg' => '#FB8C00'],  // Very Light Orange / Medium Orange
            4 => ['bg' => '#EDE7F6', 'fg' => '#5E35B1'],  // Very Light Indigo / Medium Indigo
            5 => ['bg' => '#F1F8E9', 'fg' => '#43A047'],  // Very Light Green / Medium Green
            6 => ['bg' => '#D1C4E9', 'fg' => '#673AB7'],  // Light Purple / Dark Purple
            7 => ['bg' => '#C5CAE9', 'fg' => '#3F51B5'],  // Light Indigo / Dark Indigo
            8 => ['bg' => '#B2EBF2', 'fg' => '#00ACC1'],  // Light Cyan / Dark Cyan
            9 => ['bg' => '#FFECB3', 'fg' => '#FFC107'],  // Light Amber / Dark Amber
            10 => ['bg' => '#DCEDC8', 'fg' => '#689F38'], // Light Lime / Dark Lime

            default => ['bg' => '#E3F2FD', 'fg' => '#0D47A1'], // Light Blue / Dark Blue
        };
    }
}
