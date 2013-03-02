<?php

namespace TL\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TLUserBundle extends Bundle
{

    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
