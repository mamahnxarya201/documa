<?php

declare(strict_types=1);

namespace App\Actions\Documa;

class LogAction
{
    public function getLatestActivity(): array
    {
        return [
            [
                "id" => 1,
                "name" => "John",
                "desc" => "user did something",
                "date" => "13:11 11/08/2024",
                "approx" => "3 hour ago"
            ],
            [
                "id" => 2,
                "name" => "Doe",
                "desc" => "user goes tantrum",
                "date" => "14:11 11/08/2024",
                "approx" => "2 hour ago"
            ]
        ];
    }

    public function getLatestDocument(): array
    {
        return [
            [
                "id" => 1,
                "name" => "John",
                "desc" => "did something",
                "date" => "13:11 11/08/2024",
                "approx" => "3 hour ago"
            ],
            [
                "id" => 2,
                "name" => "Doe",
                "desc" => "goes tantrum",
                "date" => "14:11 11/08/2024",
                "approx" => "2 hour ago"
            ]
        ];
    }
}
