<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('locality', null, [
                'label' => 'Locality',
                'attr' => [
                    'placeholder' => 'Enter the locality',
                ],
            ])
            ->add('country', ChoiceType::class, [
                'label' => 'Country',
                'choices' => [
                    'EMEA' => [
                        'Austria' => 'AT',
                        'Belgium' => 'BE',
                        'Czech Republic' => 'CZ',
                        'Denmark' => 'DK',
                        'Finland' => 'FI',
                        'France' => 'FR',
                        'Germany' => 'DE',
                        'Hungary' => 'HU',
                        'Ireland' => 'IE',
                        'Italy' => 'IT',
                        'Netherlands' => 'NL',
                        'Norway' => 'NO',
                        'Poland' => 'PL',
                        'Russia' => 'RU',
                        'Saudi Arabia' => 'SA',
                        'Slovakia' => 'SK',
                        'Spain' => 'ES',
                        'Sweden' => 'SE',
                        'Switzerland' => 'CH',
                        'Turkey' => 'TR',
                        'United Arab Emirates' => 'AE',
                        'United Kingdom' => 'GB',
                    ],
                    'NORTH AMERICA' => [
                        'Canada' => 'CA',
                        'Mexico' => 'MX',
                        'United States' => 'US',
                    ],
                    'SOUTH AMERICA' => [
                        'Argentina' => 'AR',
                        'Brazil' => 'BR',
                        'Chile' => 'CL',
                        'Colombia' => 'CO',
                        'Peru' => 'PE',
                        'Venezuela' => 'VE',
                    ],
                    'ASIA' => [
                        'China' => 'CN',
                        'Hong Kong' => 'HK',
                        'India' => 'IN',
                        'Indonesia' => 'ID',
                        'Japan' => 'JP',
                        'Malaysia' => 'MY',
                        'Philippines' => 'PH',
                        'Singapore' => 'SG',
                        'South Korea' => 'KR',
                        'Taiwan' => 'TW',
                        'Thailand' => 'TH',
                        'Vietnam' => 'VN',
                    ],
                    'AFRICA' => [
                        'Egypt' => 'EG',
                        'South Africa' => 'ZA',
                    ],
                ],
                'placeholder' => 'Select a country',
            ])
            ->add('latitude', NumberType::class, [
                'label' => 'Latitude',
                'attr' => [
                    'placeholder' => 'Enter the latitude',
                ],
            ])
            ->add('longitude', NumberType::class, [
                'label' => 'Longitude',
                'attr' => [
                    'placeholder' => 'Enter the longitude',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
