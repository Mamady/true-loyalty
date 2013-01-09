<?php

namespace TL\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use TL\UserBundle\Form\ClientEditForm;


class UserController extends Controller
{

    public function accountAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $em = $this->get('doctrine')->getEntityManager();

        $form = $this->createForm(new ClientEditForm(), $user);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()){

            }
            return $response;
        }

        return $this->render('TLMainBundle:Dashboard:User/account.html.twig', array(
            'form' => $form->createView(),
        ));
    }

}
