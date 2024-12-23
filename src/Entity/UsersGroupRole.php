<?php

namespace App\Entity;

use App\Repository\UsersGroupRoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: UsersGroupRoleRepository::class)]
class UsersGroupRole
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $level = null;

    /**
     * @var Collection<int, UsersGroup>
     */
    #[ORM\OneToMany(targetEntity: UsersGroup::class, mappedBy: 'role_id')]
    private Collection $usersGroups;

    public function __construct()
    {
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): static
    {
        $this->level = $level;

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
            $usersGroup->setRole($this);
        }

        return $this;
    }

    public function removeUsersGroup(UsersGroup $usersGroup): static
    {
        if ($this->usersGroups->removeElement($usersGroup)) {
            // set the owning side to null (unless already changed)
            if ($usersGroup->getRole() === $this) {
                $usersGroup->setRole(null);
            }
        }

        return $this;
    }
}
