<?php

namespace TL\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;


class CustomerController extends Controller
{

    public function indexAction()
    {
        return $this->render('TLMainBundle:Dashboard:Customer/index.html.twig');
    }


}
