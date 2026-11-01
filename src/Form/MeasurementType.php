<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'locality',
                'label' => 'Location',
                'placeholder' => 'Select a location',
            ])
            ->add('date', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
            ])
            ->add('temperature', NumberType::class, [
                'label' => 'Temperature (°C)',
                'input' => 'string',
                'attr' => ['placeholder' => 'Enter the temperature'],
            ])
            ->add('pressure', IntegerType::class, [
                'label' => 'Pressure (hPa)',
                'attr' => ['placeholder' => 'Enter the pressure'],
            ])
            ->add('precipitation', IntegerType::class, [
                'label' => 'Precipitation (%)',
                'attr' => ['placeholder' => 'Enter the precipitation'],
            ])
            ->add('cloudiness', ChoiceType::class, [
                'label' => 'Cloudiness',
                'choices' => [
                    'Clear' => 'clear',
                    'Partly cloudy' => 'partly cloudy',
                    'Cloudy' => 'cloudy',
                    'Overcast' => 'overcast',
                ],
                'placeholder' => 'Select cloudiness',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
