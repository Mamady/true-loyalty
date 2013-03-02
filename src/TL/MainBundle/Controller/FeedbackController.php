<?php

namespace TL\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;


class FeedbackController extends Controller
{

    public function indexAction()
    {
        return $this->render('TLMainBundle:Dashboard:Feedback/index.html.twig');
    }


}
