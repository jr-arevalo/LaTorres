<?php

namespace LaTorres\ProduccionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LaTorres\ProduccionBundle\Entity\TareaInsumo;
use LaTorres\ProduccionBundle\Form\TareaInsumoType;

/**
 * TareaInsumo controller.
 *
 */
class TareaInsumoController extends Controller
{
    /**
     * Lists all TareaInsumo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ProduccionBundle:TareaInsumo')->findAll();

        return $this->render('ProduccionBundle:TareaInsumo:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a TareaInsumo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProduccionBundle:TareaInsumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TareaInsumo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProduccionBundle:TareaInsumo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new TareaInsumo entity.
     *
     */
    public function newAction()
    {
        $entity = new TareaInsumo();
        $form   = $this->createForm(new TareaInsumoType(), $entity);

        return $this->render('ProduccionBundle:TareaInsumo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new TareaInsumo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new TareaInsumo();
        $form = $this->createForm(new TareaInsumoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('_show', array('id' => $entity->getId())));
        }

        return $this->render('ProduccionBundle:TareaInsumo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TareaInsumo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProduccionBundle:TareaInsumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TareaInsumo entity.');
        }

        $editForm = $this->createForm(new TareaInsumoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProduccionBundle:TareaInsumo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TareaInsumo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProduccionBundle:TareaInsumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TareaInsumo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TareaInsumoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('_edit', array('id' => $id)));
        }

        return $this->render('ProduccionBundle:TareaInsumo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TareaInsumo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProduccionBundle:TareaInsumo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TareaInsumo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl(''));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
