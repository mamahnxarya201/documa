<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\ManyToOne(inversedBy: 'sessions')]
    private ?User $user_id = null;

    #[ORM\Column(length: 255)]
    private ?string $ip_address = null;

    #[ORM\Column(length: 255)]
    private ?string $user_agent = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $last_login = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $last_logout = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ip_address;
    }

    public function setIpAddress(string $ip_address): static
    {
        $this->ip_address = $ip_address;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->user_agent;
    }

    public function setUserAgent(string $user_agent): static
    {
        $this->user_agent = $user_agent;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeImmutable
    {
        return $this->last_login;
    }

    public function setLastLogin(\DateTimeImmutable $last_login): static
    {
        $this->last_login = $last_login;

        return $this;
    }

    public function getLastLogout(): ?\DateTimeImmutable
    {
        return $this->last_logout;
    }

    public function setLastLogout(\DateTimeImmutable $last_logout): static
    {
        $this->last_logout = $last_logout;

        return $this;
    }
}
