<?php

namespace App\Form;

use App\Entity\Timer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class TimerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('startTime', DateTimeType::class, [
            'widget' => 'single_text',
            'attr' => [
                'class' => 'form-control' // Ajoutez ici les classes Bootstrap que vous souhaitez appliquer
            ]
        ])
        ->add('endTime', DateTimeType::class, [
            'widget' => 'single_text',
            'attr' => [
                'class' => 'form-control' // Ajoutez ici les classes Bootstrap que vous souhaitez appliquer
            ]
        ]);
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Timer::class,
        ]);
    }
}
