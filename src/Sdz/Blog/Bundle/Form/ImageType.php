<?php
// src/Sdz/BlogBundle/Form/ImageType.php

namespace Sdz\Blog\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImageType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('file', 'file')
    ;
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Sdz\Blog\Bundle\Entity\Image'
    ));
  }

  public function getName()
  {
    return 'sdz_blog_bundle_imagetype';
  }
}