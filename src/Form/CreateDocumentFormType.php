<?php

namespace App\Form;

use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
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

        $builder
            ->add('author', TextType::class)
            ->add('description', TextType::class)
            ->add('group', ChoiceType::class, [
                'choices' => array_flip($listUserGroup),
                'mapped' => false,
                'placeholder' => 'Choose a group',
                'required' => false,
            ])
            ->add('files', DropzoneType::class, [
                'mapped' => false,
            ])
            ->add('save', SubmitType::class, ['label' => 'Create Task']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
            'list_user_group' => [], // Default value for the custom option
        ]);

        $resolver->setRequired('list_user_group'); // Ensure the option is passed
    }
}
