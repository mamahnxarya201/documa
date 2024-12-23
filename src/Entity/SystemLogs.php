<?php

namespace App\Entity;

use App\Repository\SystemLogsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: SystemLogsRepository::class)]
class SystemLogs
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $event_type = null;

    #[ORM\Column]
    private array $event_details = [];

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getEventType(): ?string
    {
        return $this->event_type;
    }

    public function setEventType(string $event_type): static
    {
        $this->event_type = $event_type;

        return $this;
    }

    public function getEventDetails(): array
    {
        return $this->event_details;
    }

    public function setEventDetails(array $event_details): static
    {
        $this->event_details = $event_details;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }
}
