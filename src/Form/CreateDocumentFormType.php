<?php

namespace App\Form;

use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Dropzone\Form\DropzoneType;

class CreateDocumentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $listUserGroup = $options['list_user_group'];
        $listExternalLinksExpiry = $options['list_external_links_expiry'];
        $listUsers = $options['list_users'];
        $listShareable = $options['list_shareable'];

        $builder
            ->add('author', TextType::class)
            ->add('description', TextType::class)
            ->add('group', ChoiceType::class, [
                'choices' => array_flip($listUserGroup),
                'mapped' => false,
                'placeholder' => 'Choose a group',
                'required' => false,
            ])
            ->add('share', ChoiceType::class, [
                'choices' => $listShareable,
                'mapped' => false,
                'placeholder' => 'Select Share Option',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('groupShare', ChoiceType::class, [
                'choices' => array_flip($listUserGroup),
                'mapped' => false,
                'placeholder' => 'Choose a group',
                'required' => false,
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('userShare', ChoiceType::class, [
                'choices' => $listUsers,
                'mapped' => false,
                'required' => false,
                'multiple' => true,
            ])
            ->add('externalShare', ChoiceType::class, [
                'choices' => $listExternalLinksExpiry,
                'mapped' => false,
                'required' => false,
            ])
            ->add('username', TextType::class, [
                'mapped' => false,
                'required' => false,
            ])
            ->add('files', DropzoneType::class, [
                'mapped' => false,
            ])
            ->add('save', SubmitType::class, ['label' => 'Create Task']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $config = [
            'data_class' => Document::class,
            'list_user_group' => [],
            'list_users' => [],
            'list_external_links_expiry' => [],
            'list_shareable' => [
                'Group' => 'group',
                'External Links' => 'external_links'
            ],
        ];

        $resolver->setDefaults($config);

        $resolver->setRequired(array_keys($config));
    }
}
