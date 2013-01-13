<?php

namespace TL\MainBundle\Listener;

use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Session\Session;

class RequestListener
{

    public function __construct($container)
    {
        $this->container = $container;
    }


    public function onKernelRequest()
    {
        $this->checkCookieAccepted();
    }


    /**
     * Check that the user has accepted the cookie notice, if not, show the cookie notice
     */
    public function checkCookieAccepted()
    {
        $cookies = $this->container->get('request')->cookies;
        $session = $this->container->get('session');

        if(!$cookies->has('cookieAccepted'))
        {
            $session->set('showCookieNotice', 1);
        }
        elseif ($session->has('showCookieNotice') )
        {
            $session->remove('showCookieNotice');
        }

    }
}

