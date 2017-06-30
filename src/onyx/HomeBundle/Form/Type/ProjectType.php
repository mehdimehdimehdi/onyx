<?php
namespace onyx\HomeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Pas besoin de rajouter les options avec ChoiceType vu que nous allons l'utiliser via API.
        // Le formulaire ne sera jamais affiché
        $builder->add('id');
        $builder->add('description');
        $builder->add('datelivraison');
        $builder->add('hvendues');
        $builder->add('devis');
        $builder->add('user_id');
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'onyx\HomeBundle\Entity\Projet',
            'csrf_protection' => false
        ]);
    }
}