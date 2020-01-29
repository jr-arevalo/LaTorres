<?php

namespace LaTorres\BodegaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use LaTorres\BodegaBundle\Entity\TipoInsumo;
use LaTorres\BodegaBundle\Form\TipoInsumoType;

/**
 * TipoInsumo controller.
 *
 * @Route("/tipoinsumo")
 */
class TipoInsumoController extends Controller
{
    /**
     * Lists all TipoInsumo entities.
     *
     * @Route("/", name="tipoinsumo")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BodegaBundle:TipoInsumo')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a TipoInsumo entity.
     *
     * @Route("/{id}/show", name="tipoinsumo_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BodegaBundle:TipoInsumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoInsumo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new TipoInsumo entity.
     *
     * @Route("/new", name="tipoinsumo_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TipoInsumo();
        $form   = $this->createForm(new TipoInsumoType(), $entity);
        $em = $this->getDoctrine()->getManager();        
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new TipoInsumo entity.
     *
     * @Route("/create", name="tipoinsumo_create")
     * @Method("POST")
     * @Template("BodegaBundle:TipoInsumo:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new TipoInsumo();
        $form = $this->createForm(new TipoInsumoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoinsumo_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TipoInsumo entity.
     *
     * @Route("/{id}/edit", name="tipoinsumo_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BodegaBundle:TipoInsumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoInsumo entity.');
        }

        $editForm = $this->createForm(new TipoInsumoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing TipoInsumo entity.
     *
     * @Route("/{id}/update", name="tipoinsumo_update")
     * @Method("POST")
     * @Template("BodegaBundle:TipoInsumo:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BodegaBundle:TipoInsumo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoInsumo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TipoInsumoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipoinsumo_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a TipoInsumo entity.
     *
     * @Route("/{id}/delete", name="tipoinsumo_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BodegaBundle:TipoInsumo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoInsumo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipoinsumo'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
