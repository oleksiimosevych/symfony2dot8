<?php

namespace GiiiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GiiiBundle:Default:index.html.twig');
    }
}
