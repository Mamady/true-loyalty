<?php

namespace TL\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;


class PageController extends Controller
{
    public function showAction($page)
    {
        $pages = array(
            'index',
            'how_it_works',
            'features',
            'testimonials',
            'faq',
            'pricing',
            'story',
            'team',
            'jobs',
            'press',
            'contact',
        );

        if(in_array($page, $pages)) {
            return $this->render('TLMainBundle:Page:'.$page.'.html.twig');
        }

    }


    public function contactAction(Request $request)
    {

        $form = $this->createFormBuilder()
            ->add('name', 'text', array('label' => 'Your Name'))
            ->add('email', 'email', array('label' => 'Your Email'))
            ->add('message', 'textarea', array('label' => 'Message'))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $params = $request->request->get('form');
                $body = $params['message'];
                $fromEmail = $params['email'];
                $fromName = $params['name'];

                $message = new \Swift_Message();
                $message->setSubject('Contact Form Submission - '.time())
                    ->setFrom(array($fromEmail => $fromName))
                    ->setTo(array($this->container->getParameter('contact_email') => 'True Loyalty'))
                    ->setBody('From: '.$fromName.' <br>'.$body)
                    ->setContentType('text/html');
                $this->get('mailer')->send($message);

                $this->get('session')->setFlash('success', 'Your message was sent successfully.');
                return $this->redirect($this->generateUrl('TLMainBundle_page_contact'));
            }
        }

        return $this->render('TLMainBundle:Page:contact.html.twig', array('form' => $form->createView()));
    }
}
