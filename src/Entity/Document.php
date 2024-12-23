<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
class Document
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UsersGroup $author_id = null;

    #[ORM\Column(length: 255)]
    private ?string $notes = null;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UsersGroup $reviewer_id = null;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    private ?tags $tags_id = null;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?status $status_id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(nullable: true)]
    private ?array $comment = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAuthorId(): ?UsersGroup
    {
        return $this->author_id;
    }

    public function setAuthorId(?UsersGroup $author_id): static
    {
        $this->author_id = $author_id;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    public function getReviewerId(): ?UsersGroup
    {
        return $this->reviewer_id;
    }

    public function setReviewerId(?UsersGroup $reviewer_id): static
    {
        $this->reviewer_id = $reviewer_id;

        return $this;
    }

    public function getTagsId(): ?tags
    {
        return $this->tags_id;
    }

    public function setTagsId(?tags $tags_id): static
    {
        $this->tags_id = $tags_id;

        return $this;
    }

    public function getStatusId(): ?status
    {
        return $this->status_id;
    }

    public function setStatusId(?status $status_id): static
    {
        $this->status_id = $status_id;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getComment(): ?array
    {
        return $this->comment;
    }

    public function setComment(?array $comment): static
    {
        $this->comment = $comment;

        return $this;
    }
}
