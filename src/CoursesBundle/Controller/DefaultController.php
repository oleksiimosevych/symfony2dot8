<?php

namespace CoursesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoursesBundle:Default:index.html.twig');
    }
}
