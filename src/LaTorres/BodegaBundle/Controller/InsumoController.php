<?php

namespace LaTorres\BodegaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LaTorres\BodegaBundle\Entity\Insumo;
use LaTorres\BodegaBundle\Form\InsumoType;

/**
 * Insumo controller.
 *
 */
class InsumoController extends Controller
{
    /**
     * Lists all Insumo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BodegaBundle:Insumo')->findAll();

        return $this->render('BodegaBundle:Insumo:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Insumo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BodegaBundle:Insumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Insumo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BodegaBundle:Insumo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Insumo entity.
     *
     */
    public function newAction()
    {
        $entity = new Insumo();
        $form   = $this->createForm(new InsumoType(), $entity);

        return $this->render('BodegaBundle:Insumo:new.html.twig', array(
            'entity' => $entity,
            'formulario'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Insumo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Insumo();
        $form = $this->createForm(new InsumoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bodega_insumo_show', array('id' => $entity->getId())));
        }

        return $this->render('BodegaBundle:Insumo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Insumo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BodegaBundle:Insumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Insumo entity.');
        }

        $editForm = $this->createForm(new InsumoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BodegaBundle:Insumo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Insumo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BodegaBundle:Insumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Insumo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new InsumoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bodega_insumo_edit', array('id' => $id)));
        }

        return $this->render('BodegaBundle:Insumo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Insumo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BodegaBundle:Insumo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Insumo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bodega_insumo'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
