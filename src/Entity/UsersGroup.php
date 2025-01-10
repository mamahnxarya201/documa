<?php

namespace App\Entity;

use App\Repository\UsersGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: UsersGroupRepository::class)]
class UsersGroup
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private Uuid $id;

    #[ORM\ManyToOne(inversedBy: 'usersGroups')]
    #[ORM\JoinColumn(nullable: false)]
    private Group $group;

    #[ORM\ManyToOne(inversedBy: 'usersGroups')]
    #[ORM\JoinColumn(nullable: false)]
    private User $user;

    #[ORM\ManyToOne(inversedBy: 'usersGroups')]
    private UsersGroupRole $role;

    /**
     * @var Collection<int, Attachment>
     */
    #[ORM\OneToMany(targetEntity: Attachment::class, mappedBy: 'user_group_id', orphanRemoval: true)]
    private Collection $attachments;

    /**
     * @var Collection<int, Document>
     */
    #[ORM\OneToMany(targetEntity: Document::class, mappedBy: 'author_id', orphanRemoval: true)]
    private Collection $documents;

    /**
     * @var Collection<int, Document>
     */
    #[ORM\OneToMany(targetEntity: Document::class, mappedBy: 'reviewer_id', orphanRemoval: true)]
    private Collection $documents_reviewed;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'user_id', orphanRemoval: true)]
    private Collection $comments;

    /**
     * @var Collection<int, ApplicationLogs>
     */
    #[ORM\OneToMany(targetEntity: ApplicationLogs::class, mappedBy: 'user_id')]
    private Collection $applicationLogs;



    public function __construct()
    {
        $this->attachments = new ArrayCollection();
        $this->documents = new ArrayCollection();
        $this->documents_reviewed = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->applicationLogs = new ArrayCollection();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getGroup(): group
    {
        return $this->group;
    }

    public function setGroup(group $group): static
    {
        $this->group = $group;

        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getRole(): ?UsersGroupRole
    {
        return $this->role;
    }

    public function setRole(UsersGroupRole $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Attachment>
     */
    public function getAttachments(): Collection
    {
        return $this->attachments;
    }

    public function addAttachment(Attachment $attachment): static
    {
        if (!$this->attachments->contains($attachment)) {
            $this->attachments->add($attachment);
            $attachment->setUserGroup($this);
        }

        return $this;
    }

    public function removeAttachment(Attachment $attachment): static
    {
        if ($this->attachments->removeElement($attachment)) {
            // set the owning side to null (unless already changed)
            if ($attachment->getUserGroup() === $this) {
                $attachment->setUserGroup(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): static
    {
        if (!$this->documents->contains($document)) {
            $this->documents->add($document);
            $document->setAuthor($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): static
    {
        if ($this->documents->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getAuthor() === $this) {
                $document->setAuthor(null);
            }
        }

        return $this;
    }

    public function getDocumentsReviewed(): Collection
    {
        return $this->documents_reviewed;
    }

    public function addDocumentsReviewed(Document $documentsReviewed): void
    {
        if (!$this->documents->contains($documentsReviewed)) {
            $this->documents->add($documentsReviewed);
            $documentsReviewed->setAuthor($this);
        }
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
            $comment->setUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ApplicationLogs>
     */
    public function getApplicationLogs(): Collection
    {
        return $this->applicationLogs;
    }

    public function addApplicationLog(ApplicationLogs $applicationLog): static
    {
        if (!$this->applicationLogs->contains($applicationLog)) {
            $this->applicationLogs->add($applicationLog);
            $applicationLog->setUser($this);
        }

        return $this;
    }

    public function removeApplicationLog(ApplicationLogs $applicationLog): static
    {
        if ($this->applicationLogs->removeElement($applicationLog)) {
            // set the owning side to null (unless already changed)
            if ($applicationLog->getUser() === $this) {
                $applicationLog->setUser(null);
            }
        }

        return $this;
    }
}
