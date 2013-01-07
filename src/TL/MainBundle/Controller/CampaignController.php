<?php

namespace TL\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;


class CampaignController extends Controller
{

    public function newAction()
    {
        return $this->render('TLMainBundle:Dashboard:Campaign/new.html.twig');
    }

    public function previewAction($id)
    {
        return $this->render('TLMainBundle:Dashboard:Campaign/preview.html.twig');
    }


    public function materialsAction($id)
    {
        return $this->render('TLMainBundle:Dashboard:Campaign/materials.html.twig');
    }





}
