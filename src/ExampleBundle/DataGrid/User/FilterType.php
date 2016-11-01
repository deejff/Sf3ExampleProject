<?php

namespace ExampleBundle\DataGrid\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstName',
                TextType::class,
                [
                    'required' => false,
                    'attr' => [
                        'label' => 'Name'
                    ]
                ]
            )
            ->add(
                'lastName',
                TextType::class,
                [
                    'required' => false,
                    'attr' => [
                        'label' => 'Last name'
                    ]
                ]
            )
            ->add(
                'email',
                TextType::class,
                [
                    'required' => false,
                    'attr' => [
                        'label' => 'Email'
                    ]
                ]
            );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'filter';
    }

    /**
     * Configures the options for this type.
     *
     * @param OptionsResolver $resolver The resolver for the options.
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'csrf_protection' => false
            ]
        );
    }
}