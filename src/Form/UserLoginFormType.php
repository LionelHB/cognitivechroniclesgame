<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserLoginFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $isCreation = $options['is_creation'];
        $builder
            ->add('password',  PasswordType::class, [
                'label' => 'Mot de passe',
                'required' => $isCreation,
                'attr' => [
                    'placeholder' => 'Mot de passe',
                ],
            ])
            ->add('nickname', null, [
                'label' => 'Pseudo ou Email',
                'attr' => [
                    'placeholder' => 'pseudo ou email',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'is_creation' => true,
        ]);
    }
}
