<?php

namespace App\Form;

use App\Entity\AdvertisingPicture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('startDate')
            ->add('endDate')
            ->add('imageName')
            ->add('imageSize')
            ->add('updatedAt')
            ->add('timeSlots')
            ->add('customer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AdvertisingPicture::class,
        ]);
    }
}
