<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class ArticlFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libele',TextType::class,['attr' => array('placeholder' => 'Tapez libele ...' )])
            ->add('reference',TextType::class,['attr' => array('placeholder' => 'Tapez reference ...' )])
            ->add('prixunitaire',IntegerType::class,['attr' => array('placeholder' => 'Tapez prixunitaire ...' )])
            ->add('TVA',IntegerType::class,['attr' => array('placeholder' => 'Tapez TVA ...' )])
            ->add('marge',IntegerType::class,['attr' => array('placeholder' => 'Tapez marge ...' )])
            ->add('prixTTC',IntegerType::class,['attr' => array('placeholder' => 'Tapez prixTTC ...' )])
            ->add('quantitedisponibl',IntegerType::class,['attr' => array('placeholder' => 'Tapez le quantite disponibl ...' )])
            ->add('codbar',IntegerType::class,['attr' => array('placeholder' => 'Tapez le cod bar ...' )])
            ->add('category',TextType::class,['attr' => array('placeholder' => 'Tapez le category ...' ,"mapped"=>false)])
            ->add('datevalidite',DateType::class,['attr' => array('placeholder' => 'Tapez votre login ...' )])

 ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
