<?php

namespace LaTorres\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Response;
use LaTorres\UsuarioBundle\Entity\Empleado;

class DefaultController extends Controller
{
    public function LoginAction()
	{
		$peticion = $this->getRequest();
		$sesion = $peticion->getSession();
		$error = $peticion->attributes->get(
		SecurityContext::AUTHENTICATION_ERROR,
		$sesion->get(SecurityContext::AUTHENTICATION_ERROR)
		);
		return $this->render('UsuarioBundle:Default:login.html.twig', array(
		'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
		'error' => $error
		));
	}
	
	public function buscarEmpleadoAction()
	{
		//$peticion = $this->getRequest();
		//$usu=$peticion->request->get('usu');
		
		$em = $this->getDoctrine()->getManager();

        $empleados = $em->getRepository('UsuarioBundle:Empleado')->findAll();
		//$return=array("empleados"=>$empleados);
		
		return $this->render('UsuarioBundle:Usuario:empleadosBuscados.html.twig', array(
		'empleados' =>$empleados));
		//$return=json_encode($empleados);//jscon encode the array
		
		//return new Response($return,200,array('Content-Type'=>'application/json'));
		
	}
}
