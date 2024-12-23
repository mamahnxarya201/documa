<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: GroupRepository::class)]
#[ORM\Table(name: '`group`')]
class Group
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column]
    private ?int $level = null;

    /**
     * @var Collection<int, GroupInvitations>
     */
    #[ORM\OneToMany(targetEntity: GroupInvitations::class, mappedBy: 'group_id')]
    private Collection $groupInvitations;

    /**
     * @var Collection<int, UsersGroup>
     */
    #[ORM\OneToMany(targetEntity: UsersGroup::class, mappedBy: 'group_id', orphanRemoval: true)]
    private Collection $usersGroups;

    public function __construct()
    {
        $this->groupInvitations = new ArrayCollection();
        $this->usersGroups = new ArrayCollection();
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

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection<int, GroupInvitations>
     */
    public function getGroupInvitations(): Collection
    {
        return $this->groupInvitations;
    }

    public function addGroupInvitation(GroupInvitations $groupInvitation): static
    {
        if (!$this->groupInvitations->contains($groupInvitation)) {
            $this->groupInvitations->add($groupInvitation);
            $groupInvitation->setGroupId($this);
        }

        return $this;
    }

    public function removeGroupInvitation(GroupInvitations $groupInvitation): static
    {
        if ($this->groupInvitations->removeElement($groupInvitation)) {
            // set the owning side to null (unless already changed)
            if ($groupInvitation->getGroupId() === $this) {
                $groupInvitation->setGroupId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UsersGroup>
     */
    public function getUsersGroups(): Collection
    {
        return $this->usersGroups;
    }

    public function addUsersGroup(UsersGroup $usersGroup): static
    {
        if (!$this->usersGroups->contains($usersGroup)) {
            $this->usersGroups->add($usersGroup);
            $usersGroup->setGroupId($this);
        }

        return $this;
    }

    public function removeUsersGroup(UsersGroup $usersGroup): static
    {
        if ($this->usersGroups->removeElement($usersGroup)) {
            // set the owning side to null (unless already changed)
            if ($usersGroup->getGroupId() === $this) {
                $usersGroup->setGroupId(null);
            }
        }

        return $this;
    }
}
