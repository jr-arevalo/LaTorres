<?php

namespace LaTorres\ProduccionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LaTorres\ProduccionBundle\Entity\Tarea;
use LaTorres\ProduccionBundle\Form\TareaType;
use LaTorres\BodegaBundle\Entity\RegistroBodega;
use LaTorres\BodegaBundle\Entity\Insumo;
use LaTorres\BodegaBundle\Entity\TipoInsumo;
/**
 * Tarea controller.
 *
 */
class TareaController extends Controller
{
    /**
     * Lists all Tarea entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProduccionBundle:Tarea')->findTareasDelDia();
         $terminadas = $em->getRepository('ProduccionBundle:Tarea')->findBy(array('cantidad'=>2));
        return $this->render('ProduccionBundle:Tarea:index.html.twig', array(
            'entities' => $entities,
            'terminadas'=>$terminadas
        ));
    }
    public function finalizarAction(Request $request, $id)
    {	
$ban=true;
        if($id==0){      $id= $request->request->get('idTarea');$ban=false;}
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ProduccionBundle:Tarea')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarea entity.');
        }
       
        $editForm = $this->createFormBuilder($entity)
            ->add('cantidad', 'number')
            ->getForm();
                                if($ban){$editForm->bind($request);

                                if ($editForm->isValid()) {
                                    $em->persist($entity);
                                    $em->flush();

                                    return $this->redirect($this->generateUrl('tarea', array('id' => $id)));
                            }}

        return $this->render('ProduccionBundle:Tarea:finalizar.html.twig', array(
            'entity'      => $entity,
            'formulario'   => $editForm->createView(),
            
        ));
 }

    /**
     * Finds and displays a Tarea entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProduccionBundle:Tarea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarea entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProduccionBundle:Tarea:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Tarea entity.
     *
     */
  
    public function nuevoAction()
    {
        return $this->render('ProduccionBundle:Tarea:nuevo.html.twig', array(
             'idTarea'   => null
        ));
    }
    
    public function tipoTareaAction($idTarea=null)
    {	
		$tipoTarea = $this->getRequest()->request->get('tipoTarea');
		if($tipoTarea==null){$tipoTarea=1;}
		
                                                    $em = $this->getDoctrine()->getManager();
		if($idTarea){
			
			$entity = $em->getRepository('ProduccionBundle:Tarea')->find($idTarea);
			if (!$entity) {
				throw $this->createNotFoundException('Unable to find Tarea entity.');
			}
			$form   = $this->createForm(new TareaType(), $entity,array('tipoTarea' => $entity->getTipoTarea()->getId()));
			$deleteForm = $this->createDeleteForm($idTarea);

			return $this->render('ProduccionBundle:Tarea:tipo.html.twig', array(
				'entity'      => $entity,
				'formulario'   => $form->createView(),
				'delete_form' => $deleteForm->createView(),
				'idTipoTarea'=>$entity->getTipoTarea()->getId()
			));
		}else{
			$entity = new Tarea();
                                                                                $tiposInsumo=$em->getRepository('BodegaBundle:TipoInsumo')->findTiposInsumoDeTarea($tipoTarea);
                                                                                foreach ($tiposInsumo as $tipoInsumo) {
                                                                                  $registroBodega=new RegistroBodega();
                                                                                    $insumos=$em->getRepository('BodegaBundle:Insumo')->findBy(array('tipoInsumo'=>$tipoInsumo));
                                                                                    $insumoe   =new Insumo();
                                                                                    foreach($insumos as $insumo)
                                                                                        { 
                                                                                         $insumo->setTipoInsumo($tipoInsumo);
                                                                                         $registroBodega->setInsumo($insumo);
                                                                                        } 
                                                                                        
                                                                                       
                                                                                    $entity->addRegistroBodega($registroBodega);
                                                                                  
                                                                                }                                                                             
			$form   = $this->createForm(new TareaType(), $entity,array('tipoTarea' => $tipoTarea));
			return $this->render('ProduccionBundle:Tarea:tipo.html.twig', array(
				 'formulario'   => $form->createView(),
				 'idTipoTarea'=>$tipoTarea
			));
		}
        
    }
	/**
     * Displays a form to edit an existing Tarea entity.
     *
     */
    public function editarAction($id)
    {
		return $this->render('ProduccionBundle:Tarea:nuevo.html.twig', array(
             'idTarea'   => $id
        ));
    }
	
   public function newAction()
    {
        $entity = new Corte();
        $form   = $this->createForm(new CorteType(), $entity);

        return $this->render('ProduccionBundle:Corte:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    public function createAction(Request $request)
    {
        $entity  = new Tarea();
		
        $form = $this->createForm(new TareaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $entity->setFecha(new \DateTime('today'));
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tarea_show', array('id' => $entity->getId())));
        }

        return $this->render('ProduccionBundle:Tarea:nuevo.html.twig', array(
            'entity' => $entity,
            'formulario'   => $form->createView(),
        ));
    }

    

    /**
     * Edits an existing Tarea entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProduccionBundle:Tarea')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarea entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TareaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tarea_edit', array('id' => $id)));
        }

        return $this->render('ProduccionBundle:Tarea:editar.html.twig', array(
            'entity'      => $entity,
            'formulario'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Tarea entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProduccionBundle:Tarea')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tarea entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tarea'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
