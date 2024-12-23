<?php

namespace App\Entity;

use App\Repository\ApplicationLogsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: ApplicationLogsRepository::class)]
class ApplicationLogs
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\ManyToOne(inversedBy: 'applicationLogs')]
    private ?UsersGroup $user_id = null;

    #[ORM\Column(length: 255)]
    private ?string $user_type = null;

    #[ORM\Column(length: 255)]
    private ?string $event_type = null;

    #[ORM\Column(length: 255)]
    private ?string $target_id = null;

    #[ORM\Column(length: 255)]
    private ?string $target_type = null;

    #[ORM\Column]
    private array $metadata = [];

    #[ORM\Column]
    private ?\DateTimeImmutable $performed_at = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getUserId(): ?UsersGroup
    {
        return $this->user_id;
    }

    public function setUserId(?UsersGroup $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getUserType(): ?string
    {
        return $this->user_type;
    }

    public function setUserType(string $user_type): static
    {
        $this->user_type = $user_type;

        return $this;
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

    public function getTargetId(): ?string
    {
        return $this->target_id;
    }

    public function setTargetId(string $target_id): static
    {
        $this->target_id = $target_id;

        return $this;
    }

    public function getTargetType(): ?string
    {
        return $this->target_type;
    }

    public function setTargetType(string $target_type): static
    {
        $this->target_type = $target_type;

        return $this;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function setMetadata(array $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function getPerformedAt(): ?\DateTimeImmutable
    {
        return $this->performed_at;
    }

    public function setPerformedAt(\DateTimeImmutable $performed_at): static
    {
        $this->performed_at = $performed_at;

        return $this;
    }
}
