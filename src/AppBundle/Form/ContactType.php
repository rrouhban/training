<?php


namespace AppBundle\Form;


use AppBundle\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('subject', TextType::class)
            ->add('message', TextareaType::class)
            ->add('submit', SubmitType::class, [
                'label' => 'send',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // @todo use a DTO (use a storage other than an entity and handle it with a service).

        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}












