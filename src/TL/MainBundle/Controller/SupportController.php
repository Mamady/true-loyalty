<?php

namespace TL\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use TL\UserBundle\Form\ClientEditForm;


class SupportController extends Controller
{

    public function indexAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getEntityManager();


        $form = $this->createFormBuilder()
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

        return $this->render('TLMainBundle:Dashboard:Support/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
