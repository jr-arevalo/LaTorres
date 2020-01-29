<?php

namespace LaTorres\BodegaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use LaTorres\BodegaBundle\Entity\RegistroBodega;
use LaTorres\BodegaBundle\Form\RegistroBodegaType;

/**
 * RegistroBodega controller.
 *
 */
class RegistroBodegaController extends Controller
{
    /**
     * Lists all RegistroBodega entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BodegaBundle:RegistroBodega')->findAll();

        return $this->render('BodegaBundle:RegistroBodega:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a RegistroBodega entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BodegaBundle:RegistroBodega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegistroBodega entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BodegaBundle:RegistroBodega:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new RegistroBodega entity.
     *
     */
    public function newAction()
    {
        $entity = new RegistroBodega();
        $form   = $this->createForm(new RegistroBodegaType(), $entity);

        return $this->render('BodegaBundle:RegistroBodega:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new RegistroBodega entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new RegistroBodega();
        $form = $this->createForm(new RegistroBodegaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('registrobodega_show', array('id' => $entity->getId())));
        }

        return $this->render('BodegaBundle:RegistroBodega:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing RegistroBodega entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BodegaBundle:RegistroBodega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegistroBodega entity.');
        }

        $editForm = $this->createForm(new RegistroBodegaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BodegaBundle:RegistroBodega:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing RegistroBodega entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BodegaBundle:RegistroBodega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegistroBodega entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RegistroBodegaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('registrobodega_edit', array('id' => $id)));
        }

        return $this->render('BodegaBundle:RegistroBodega:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a RegistroBodega entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BodegaBundle:RegistroBodega')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RegistroBodega entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('registrobodega'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
