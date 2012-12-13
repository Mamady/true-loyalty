<?php

namespace TL\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
}
