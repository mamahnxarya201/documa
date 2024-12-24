<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?UsersGroup $author = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UsersGroup $reviewer = null;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    private ?tags $tags = null;

    #[ORM\ManyToOne(inversedBy: 'documents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?status $status = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'document_id', orphanRemoval: true)]
    private Collection $comments;

    /**
     * @var Collection<int, DocumentLink>
     */
    #[ORM\OneToMany(targetEntity: DocumentLink::class, mappedBy: 'document')]
    private Collection $documentLinks;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->documentLinks = new ArrayCollection();
    }
    
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

    public function getAuthor(): ?UsersGroup
    {
        return $this->author;
    }

    public function setAuthor(?UsersGroup $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getReviewer(): ?UsersGroup
    {
        return $this->reviewer;
    }

    public function setReviewer(?UsersGroup $reviewer): static
    {
        $this->reviewer = $reviewer;

        return $this;
    }

    public function getTags(): ?tags
    {
        return $this->tags;
    }

    public function setTags(?tags $tags): static
    {
        $this->tags = $tags;

        return $this;
    }

    public function getStatus(): ?status
    {
        return $this->status;
    }

    public function setStatus(?status $status): static
    {
        $this->status = $status;

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

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setDocument($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getDocument() === $this) {
                $comment->setDocument(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DocumentLink>
     */
    public function getDocumentLinks(): Collection
    {
        return $this->documentLinks;
    }

    public function addDocumentLink(DocumentLink $documentLink): static
    {
        if (!$this->documentLinks->contains($documentLink)) {
            $this->documentLinks->add($documentLink);
            $documentLink->setDocument($this);
        }

        return $this;
    }

    public function removeDocumentLink(DocumentLink $documentLink): static
    {
        if ($this->documentLinks->removeElement($documentLink)) {
            // set the owning side to null (unless already changed)
            if ($documentLink->getDocument() === $this) {
                $documentLink->setDocument(null);
            }
        }

        return $this;
    }
}
