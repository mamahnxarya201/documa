<?php

namespace App\Entity;

use App\Repository\DocumentLinkRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: DocumentLinkRepository::class)]
class DocumentLink
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\ManyToOne(inversedBy: 'documentLinks')]
    private ?Shareable $shareable = null;

    #[ORM\ManyToOne(inversedBy: 'documentLinks')]
    private ?Document $document = null;

    #[ORM\Column(length: 255)]
    private ?string $token = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $expires_at = null;

    #[ORM\Column]
    private ?bool $is_expired = null;

    #[ORM\Column(nullable: true)]
    private ?int $max_access = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getShareable(): ?shareable
    {
        return $this->shareable;
    }

    public function setShareable(?shareable $shareable): static
    {
        $this->shareable = $shareable;

        return $this;
    }

    public function getDocument(): ?document
    {
        return $this->document;
    }

    public function setDocument(?document $document): static
    {
        $this->document = $document;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): static
    {
        $this->token = $token;

        return $this;
    }

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expires_at;
    }

    public function setExpiresAt(?\DateTimeImmutable $expires_at): static
    {
        $this->expires_at = $expires_at;

        return $this;
    }

    public function isExpired(): ?bool
    {
        return $this->is_expired;
    }

    public function setExpired(bool $is_expired): static
    {
        $this->is_expired = $is_expired;

        return $this;
    }

    public function getMaxAccess(): ?int
    {
        return $this->max_access;
    }

    public function setMaxAccess(?int $max_access): static
    {
        $this->max_access = $max_access;

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
