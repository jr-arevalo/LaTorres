<?php

namespace LaTorres\ReportesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ReportesBundle:Default:index.html.twig', array('name' => $name));
    }
}
