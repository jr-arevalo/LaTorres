<?php

namespace LaTorres\ProduccionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use LaTorres\ProduccionBundle\Entity\Tarea;
class DefaultController extends Controller
{
     public function indexAction()
	{	
	return $this->render('ProduccionBundle:Default:index.html.twig',
		array('formulario' => "")
		);
	}
    public function lotesAction()
    {
        return $this->render('ProduccionBundle:Default:lotes.html.twig', array());
    }
	
	public function buscarLoteAction()
	{
	$peticion = $this->getRequest();
	$id_lote=$peticion->request->get('id_lote');
	
    $return=array("greeting"=>"Te llamas $id_lote!");
   

	$return=json_encode($return);//jscon encode the array
  
	return new Response($return,200,array('Content-Type'=>'application/json'));
   }
   
   public function listaTareasAction()
	{
		$em = $this->getDoctrine()->getEntityManager();
		$tiposTarea = $em->getRepository('ProduccionBundle:TipoTarea')->findAll();
		return $this->render(
		'ProduccionBundle:Tarea:tiposTarea.html.twig',
		array('tiposTarea' => $tiposTarea)
		);
	}
    public function cambiarTareaAction()
	{
	$peticion = $this->getRequest();
	$tipoTarea=$peticion->request->get('id');
	$return=array("cambio"=>$tipoTarea);
	$return=json_encode($return);
	return new Response($return,200,array('Content-Type'=>'application/json'));
	}
	
        public function produccionAction()
        {
            //solo se necesita el nombre del tipoTarea
           $em = $this->getDoctrine()->getEntityManager();
		$tiposTarea = $em->getRepository('ProduccionBundle:TipoTarea')->findAll();
		return $this->render(
		'ProduccionBundle:Default:produccion.html.twig',
		array('tiposTarea' => $tiposTarea)
		);  
        }
            public function produccionTareaAction($tipoTarea)
        {
                return $this->render('ProduccionBundle:Default:'.$tipoTarea.'.html.twig');  
        }
   
}
