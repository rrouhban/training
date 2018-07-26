<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ContactType;

class DefaultController extends AbstractController
{
    /**
     * @Cache(maxage=3600)
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/home.html.twig');
    }

    /**
     * @Route("/contact-us", name="contact")
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            /** @var Contact $contact */
            $contact = $form->getData();

            $manager = $this->getDoctrine()->getManager();

            $manager->persist($contact);
            $manager->flush();
        }

        return $this->render('default/contact.html.twig', [
            'contact_form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/comme-bon-me-semble", name="last_users")
     */
    public function lastUsersAction()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findBy([], [],  5);

        return $this->render('default/last_users.html.twig', [
            'users' => $users,
        ]);
    }
}
