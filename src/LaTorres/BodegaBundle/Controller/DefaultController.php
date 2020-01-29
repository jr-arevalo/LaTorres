<?php

namespace LaTorres\BodegaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BodegaBundle:Default:index.html.twig', array('name' => $name));
    }
}
