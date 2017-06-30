<?php
namespace onyx\HomeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom');
        $builder->add('prenom');
        $builder->add('mail');
        $builder->add('tel');
        $builder->add('mdp');
        $builder->add('actif');
        $builder->add('admin');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'onyx\HomeBundle\Entity\Utilisateur',
            'csrf_protection' => false
        ]);
    }
}