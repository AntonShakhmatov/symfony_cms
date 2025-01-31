<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use App\Entity\BodyBlock;

class BlockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', TextType::class, [
                'label' => 'Type of block (text)',
                'required' => true
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Inside',
                'required' => false
            ])
            ->add('image', FileType::class, [
                'label' => 'Block image',
                'by_reference'  => false,
                'mapped' => false, // Поле не связано с сущностью напрямую
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2M', // Максимальный размер файла
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Please upload the video (jpeg, png, gif)',
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BodyBlock::class,
        ]);
    }
}
