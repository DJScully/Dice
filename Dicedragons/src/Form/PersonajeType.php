<?php

namespace App\Form;

use App\Entity\Personaje;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonajeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    
    {
        //$_SESSION[""];
        $builder
            ->add('Nombre')
            ->add('Alienacion')
            ->add('Trasfondo')
            ->add('usuario')
            ->add('Raza')
            ->add('Clase')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personaje::class,
        ]);
    }
}
