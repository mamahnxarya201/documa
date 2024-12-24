<?php

namespace App\DataFixtures;

use App\Entity\UsersGroupRole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Group;
use App\Entity\Status;
use App\Entity\Tags;
use App\Entity\User;
use App\Entity\SystemLogs;
use App\Entity\GroupInvitations;
use App\Entity\Document;
use App\Entity\Comment;
use App\Entity\UsersGroup;
class BaseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->beginTransaction();
        try {
            // Example: Creating Groups
            $groups = [];
            for ($i = 1; $i <= 5; $i++) {
                $group = new Group();
                $group->setName("Group $i");
                $group->setLevel(rand(1, 10));
                $group->setCreatedAt(new \DateTimeImmutable());
                $group->setUpdatedAt(new \DateTimeImmutable());
                $manager->persist($group);
                $groups[] = $group;
            }

            // Example: Creating Statuses
            $statuses = [];
            $statusNames = ['Pending', 'Active', 'Inactive'];
            foreach ($statusNames as $name) {
                $status = new Status();
                $status->setName($name);
                $status->setDescription("Description for $name");
                $status->setCreatedAt(new \DateTimeImmutable());
                $status->setUpdatedAt(new \DateTimeImmutable());
                $manager->persist($status);
                $statuses[] = $status;
            }

            // Example: Creating Tags
            $tags = [];
            for ($i = 1; $i <= 5; $i++) {
                $tag = new Tags();
                $tag->setName("Tag $i");
                $tag->setDescription("Description for Tag $i");
                $tag->setUrgencyLevel(rand(1, 5));
                $tag->setCreatedAt(new \DateTimeImmutable());
                $tag->setUpdatedAt(new \DateTimeImmutable());
                $manager->persist($tag);
                $tags[] = $tag;
            }

            // Example: Creating Users
            $users = [];
            for ($i = 1; $i <= 10; $i++) {
                $user = new User();
                $user->setUsername("User$i");
                $user->setRoles(["ROLE_USER"]);
                $user->setPassword("password$i");
                $user->setEmail("user$i@example.com");
                $user->setEmailVerified(true);
                $user->setCreatedAt(new \DateTimeImmutable());
                $user->setUpdatedAt(new \DateTimeImmutable());
                $manager->persist($user);
                $users[] = $user;
            }

            // Example: Creating System Logs
            for ($i = 1; $i <= 10; $i++) {
                $log = new SystemLogs();
                $log->setEventType("EventType$i");
                $log->setEventDetails(["detail" => "Details of event $i"]);
                $log->setCreatedAt(new \DateTimeImmutable());
                $manager->persist($log);
            }

            // Example: Creating Group Invitations
            foreach ($groups as $group) {
                foreach ($statuses as $status) {
                    $invitation = new GroupInvitations();
                    $invitation->setGroup($group);
                    $invitation->setStatus($status);
                    $invitation->setEmail("invitee" . rand(1, 100) . "@example.com");
                    $invitation->setRole(rand(1, 5));
                    $invitation->setCreatedAt(new \DateTimeImmutable());
                    $invitation->setUpdatedAt(new \DateTimeImmutable());
                    $manager->persist($invitation);
                }
            }



            $roles = [];
            $roleData = [
                ['name' => 'Admin', 'description' => 'Admin Role for specified group', 'level' => 1],
                ['name' => 'Reviewer', 'description' => 'Reviewer Role for specified group', 'level' => 2],
                ['name' => 'Member', 'description' => 'Member Role for specified group', 'level' => 3],
            ];

            foreach ($roleData as $data) {
                $role = new UsersGroupRole();
                $role->setName($data['name']);
                $role->setDescription($data['description']);
                $role->setLevel($data['level']);
                $manager->persist($role);
                $roles[$data['name']] = $role;
            }

            // Example: Creating UsersGroup
            $usersGroups = [];
            foreach ($groups as $group) {
                foreach ($users as $user) {
                    $usersGroup = new UsersGroup();
                    $usersGroup->setGroup($group);
                    $usersGroup->setUser($user);
                    $usersGroup->setRole($roles['Member']); // Assign role object
                    $manager->persist($usersGroup);
                    $usersGroups[] = $usersGroup;
                }
            }

            // Example: Creating Documents
            $documents = [];
            foreach ($usersGroups as $author) {
                foreach ($tags as $tag) {
                    foreach ($statuses as $status) {
                        $document = new Document();
                        $document->setName("Document " . rand(1, 100));
                        $document->setDescription("Description for Document " . rand(1, 100));
                        $document->setAuthor($author);
                        $document->setReviewer($usersGroups[array_rand($usersGroups)]);
                        $document->setTags($tag);
                        $document->setStatus($status);
                        $document->setCreatedAt(new \DateTimeImmutable());
                        $document->setUpdatedAt(new \DateTimeImmutable());
                        $manager->persist($document);
                        $documents[] = $document;
                    }
                }
            }

            // Example: Creating Comments
            foreach ($usersGroups as $user) {
                foreach ($documents as $document) {
                    $comment = new Comment();
                    $comment->setUser($user);
                    $comment->setDocument($document);
                    $comment->setTitle("Comment " . rand(1, 100));
                    $comment->setDescription("Description for Comment " . rand(1, 100));
                    $comment->setCreatedAt(new \DateTimeImmutable());
                    $comment->setUpdatedAt(new \DateTimeImmutable());
                    $manager->persist($comment);
                }
            }

            $manager->flush();
            $manager->commit();
        } catch (\Exception $e) {
            $manager->rollback();
            throw $e;
        }

    }
}
