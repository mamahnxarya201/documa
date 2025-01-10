<?php

namespace App\Controller;

use App\Entity\Document;
use App\Repository\UsersGroupRepository;
use Dom\DocumentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Dropzone\Form\DropzoneType;

class DocumentController extends AbstractController
{
    #[Route('/document', name: 'app_document_list')]
    public function index(): Response
    {
        $documents = [
            [
                'id' => 1,
                'name' => 'Document 1',
                'author' => 'John Doe',
                'status' => 'Approved',
                'total_files' => 10,
                'shared_to' => [
                    [
                        "id" => 1,
                        "title" => "Group A",
                        'color_bg' => '#FFEBEE',
                        'color_fg' => '#B71C1C'
                    ],
                    [
                        "id" => 2,
                        "title" => "Group B",
                        'color_bg' => '#E3F2FD',
                        'color_fg' => '#0D47A1'
                    ],
                    [
                        "id" => 3,
                        "title" => "Group C",
                        'color_bg' => '#E8F5E9',
                        'color_fg' => '#1B5E20'
                    ],
                ],
                'tags' => [
                    [
                        'id' => 1,
                        'title' => 'NDA',
                        'color_bg' => '#FFF3E0',
                        'color_fg' => '#E65100'
                    ],
                    [
                        'id' => 2,
                        'title' => 'SI',
                        'color_bg' => '#FCE4EC',
                        'color_fg' => '#880E4F'
                    ]
                ],
                'created_at' => 1733903863,
                'published_at' => 1733903863,
                'last_update' => 1733903863,
                'reviewed_by' => 'Mark Stuart'
            ],
            [
                'id' => 2,
                'name' => 'Document 2',
                'author' => 'Jane Smith',
                'status' => 'Published',
                'total_files' => 15,
                'shared_to' => [
                    [
                        "id" => 4,
                        "title" => "Group D",
                        'color_bg' => '#FFFDE7',
                        'color_fg' => '#F57F17'
                    ],
                    [
                        "id" => 5,
                        "title" => "Group E",
                        'color_bg' => '#EDE7F6',
                        'color_fg' => '#311B92'
                    ],
                    [
                        "id" => 6,
                        "title" => "Group F",
                        'color_bg' => '#F3E5F5',
                        'color_fg' => '#4A148C'
                    ],
                ],
                'tags' => [
                    [
                        'id' => 3,
                        'title' => 'Confidential',
                        'color_bg' => '#E1F5FE',
                        'color_fg' => '#0277BD'
                    ],
                    [
                        'id' => 4,
                        'title' => 'Urgent',
                        'color_bg' => '#FBE9E7',
                        'color_fg' => '#BF360C'
                    ]
                ],
                'created_at' => 1733904863,
                'published_at' => 1733904863,
                'last_update' => 1733904863,
                'reviewed_by' => 'Alice Johnson'
            ],
            [
                'id' => 3,
                'name' => 'Document 3',
                'author' => 'Alice Brown',
                'status' => 'For Review',
                'total_files' => 20,
                'shared_to' => [
                    [
                        "id" => 7,
                        "title" => "Group G",
                        'color_bg' => '#E0F7FA',
                        'color_fg' => '#006064'
                    ],
                    [
                        "id" => 8,
                        "title" => "Group H",
                        'color_bg' => '#FFECB3',
                        'color_fg' => '#FF6F00'
                    ],
                    [
                        "id" => 9,
                        "title" => "Group I",
                        'color_bg' => '#D1C4E9',
                        'color_fg' => '#4527A0'
                    ],
                ],
                'tags' => [
                    [
                        'id' => 5,
                        'title' => 'Review',
                        'color_bg' => '#F1F8E9',
                        'color_fg' => '#33691E'
                    ],
                    [
                        'id' => 6,
                        'title' => 'Important',
                        'color_bg' => '#FFCDD2',
                        'color_fg' => '#C62828'
                    ]
                ],
                'created_at' => 1733905863,
                'published_at' => 1733905863,
                'last_update' => 1733905863,
                'reviewed_by' => 'Tom Blue'
            ]
        ];

        return $this->render('document/list_document.html.twig', [
            'documents' => $documents,
        ]);
    }

    #[Route('/document/detail', name: 'app_document_detail')]
    public function detail(): Response
    {
        $document = [
            'id' => 1,
            'name' => 'Handling Radioactive Pipe',
            'author' => [
                'name' => 'John Doe',
                'role' => 'Yard Supervisor',
                'tier' => 6
            ],
            'type' => 'Service Instruction',
            'status' => 'Approved',
            'total_files' => 10,
            'shared_to' => [
                [
                    "id" => 1,
                    "title" => "Group A",
                    'color_bg' => '#FFEBEE',
                    'color_fg' => '#B71C1C'
                ],
                [
                    "id" => 2,
                    "title" => "Group B",
                    'color_bg' => '#E3F2FD',
                    'color_fg' => '#0D47A1'
                ],
                [
                    "id" => 3,
                    "title" => "Group C",
                    'color_bg' => '#E8F5E9',
                    'color_fg' => '#1B5E20'
                ],
            ],
            'tags' => [
                [
                    'id' => 1,
                    'title' => 'NDA',
                    'color_bg' => '#FFF3E0',
                    'color_fg' => '#E65100'
                ],
                [
                    'id' => 2,
                    'title' => 'SI',
                    'color_bg' => '#FCE4EC',
                    'color_fg' => '#880E4F'
                ]
            ],
            'created_at' => 1733903863,
            'published_at' => 1734510603,
            'last_update' => 1734251403,
            'reviewed_by' => [
                'name' => 'Mark Stuart',
                'role' => 'Quality HSE Reviewer',
                'tier' => 3
            ],
        ];
        return $this->render('document/detail_document.html.twig', [
            'controller_name' => 'DetailController',
            'document' => $document,
        ]);
    }

    #[Route('/document/create', name: 'app_document_form')]
    public function create_document_form(Request $request): Response
    {
        $initialDocument = (new Document())
            ->setCreatedAt(new \DateTimeImmutable('now'))
            ->setUpdatedAt(new \DateTimeImmutable('now'));

//        $reviewerOption = (new UsersGroupRepository())

        $form = $this->createFormBuilder($initialDocument)
            ->add('Author', TextType::class)
            ->add('Description', TextType::class)
            ->add('Files', DropzoneType::class, ['mapped' => false])
//            ->add('Reviewer', ChoiceType::class, [])
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();

        return $this->render('document/create_document_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
