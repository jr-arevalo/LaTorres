<?php

namespace LaTorres\EstadisticasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EstadisticasBundle:Default:index.html.twig', array('name' => $name));
    }
}
