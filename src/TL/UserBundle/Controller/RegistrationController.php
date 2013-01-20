<?php

namespace TL\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use TL\MainBundle\Util\TVarDumper;
use TL\UserBundle\Form\RegisterClientForm;
use TL\UserBundle\Entity\User;


/**
 * Controller managing the registration
 */
class RegistrationController extends BaseController
{
    public function registerAction()
    {
        $request = $this->container->get('request');

        $user = new User();
        $user->setPlan($request->query->get('plan'));
        $form = $this->container->get('fos_user.registration.form');
        //$form = $this->container->get('form.factory')->create(new RegisterClientForm('TL\UserBundle\Entity\User'), $user);
        $form->setData($user);

        $formHandler = $this->container->get('fos_user.registration.form.handler');
        $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

        $process = $formHandler->process($confirmationEnabled);
//        echo TVarDumper::dump($form->getData());exit;
        if ($process) {
            $user = $form->getData();

            $authUser = false;
            if ($confirmationEnabled) {
                $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
                $route = 'fos_user_registration_check_email';
            } else {
                $authUser = true;
                $route = 'fos_user_registration_confirmed';
            }

            $this->setFlash('fos_user_success', 'registration.flash.user_created');
            $url = $this->container->get('router')->generate($route);
            $response = new RedirectResponse($url);

            if ($authUser) {
                $this->authenticateUser($user, $response);
            }

            return $response;
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register.html.'.$this->getEngine(), array(
            'form' => $form->createView(),
            'plan' => $request->query->get('plan')
        ));
    }
}
