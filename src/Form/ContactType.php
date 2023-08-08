<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $isCreation = $options['is_creation'];
        $builder
            ->add('lastName', TextType::class, [
                'label' => 'nom',
                'attr' => [
                    'placeholder' => 'nom',
                ],
            ])
            ->add('firstName',  TextType::class, [
                'label' => 'Prénom',
                'required' => $isCreation,
                'attr' => [
                    'placeholder' => 'Prénom',
                ],
            ])

            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => $isCreation,
                'attr' => [
                    'placeholder' => 'Email'
                ]
            ])
            ->add('compagny',  TextType::class, [
                'label' => 'Société',
                'required' => $isCreation,
                'attr' => [
                    'placeholder' => 'Société',
                ],
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Téléphone',
                'required' => $isCreation,
                'attr' => [
                    'placeholder' => 'Téléphone'
                ]
            ])
            ->add('message',  TextareaType::class, [
                'label' => 'Message',
                'required' => $isCreation,
                'attr' => [
                    'placeholder' => 'Message',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'is_creation' => true,
        ]);
    }
}
