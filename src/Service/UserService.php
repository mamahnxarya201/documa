<?php

namespace App\Service;

use App\Entity\UsersGroup;
use App\Repository\UserRepository;
use App\Repository\UsersGroupRepository;
use App\Repository\UsersGroupRoleRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
        private UsersGroupRepository $usersGroupRepository,
        private UsersGroupRoleRepository $usersGroupRoleRepository,
    )
    {}

    public function getListReviewerForUser(Uuid $userId): array
    {
        $listUserGroup = $this->usersGroupRepository->findBy(['user' => $userId]);
        $listReviewer = [];
        foreach ($listUserGroup as $userGroup) {
            $listReviewer[$userGroup->getGroup()->getName()] = $this->usersGroupRepository->getListReviewerByGroupId($userGroup->getGroup()->getId());
        }
        return $listReviewer;
    }

    public function getListUserGroupName(Uuid $userId): array
    {
        $listUserGroup = $this->usersGroupRepository->findBy(['user' => $userId]);
        $listUserGroupName = [];
        foreach ($listUserGroup as $userGroup) {
            $listUserGroupName[$userGroup->getGroup()->getId()->toString()] = $userGroup->getGroup()->getName();
        }
        return $listUserGroupName;
    }
}