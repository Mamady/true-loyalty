<?php

namespace TL\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;


class LoyaltyCardController extends Controller
{
    public function editAction()
    {
        return $this->render('TLMainBundle:Dashboard:LoyaltyCard/edit.html.twig');
    }


}
