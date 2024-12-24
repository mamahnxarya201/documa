<?php

namespace App\Entity;

use App\Repository\ShareableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: ShareableRepository::class)]
class Shareable
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(type: 'uuid')]
    private ?Uuid $reference_id = null;

    /**
     * @var Collection<int, DocumentLink>
     */
    #[ORM\OneToMany(targetEntity: DocumentLink::class, mappedBy: 'shareable')]
    private Collection $documentLinks;

    public function __construct()
    {
        $this->documentLinks = new ArrayCollection();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getReferenceId(): ?Uuid
    {
        return $this->reference_id;
    }

    public function setReferenceId(Uuid $reference_id): static
    {
        $this->reference_id = $reference_id;

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
            $documentLink->setShareable($this);
        }

        return $this;
    }

    public function removeDocumentLink(DocumentLink $documentLink): static
    {
        if ($this->documentLinks->removeElement($documentLink)) {
            // set the owning side to null (unless already changed)
            if ($documentLink->getShareable() === $this) {
                $documentLink->setShareable(null);
            }
        }

        return $this;
    }
}
