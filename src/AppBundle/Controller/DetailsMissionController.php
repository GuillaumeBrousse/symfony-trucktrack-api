<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DetailsMission;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Detailsmission controller.
 *
 */
class DetailsMissionController extends Controller
{
    /**
     * Lists all detailsMission entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detailsMissions = $em->getRepository('AppBundle:DetailsMission')->findAll();

        return $this->render('detailsmission/index.html.twig', array(
            'detailsMissions' => $detailsMissions,
        ));
    }

    /**
     * Creates a new detailsMission entity.
     *
     */
    public function newAction(Request $request)
    {
        $detailsMission = new Detailsmission();
        $form = $this->createForm('AppBundle\Form\DetailsMissionType', $detailsMission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detailsMission);
            $em->flush($detailsMission);

            return $this->redirectToRoute('detailsmission_show', array('id' => $detailsMission->getId()));
        }

        return $this->render('detailsmission/new.html.twig', array(
            'detailsMission' => $detailsMission,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detailsMission entity.
     *
     */
    public function showAction(DetailsMission $detailsMission)
    {
        $deleteForm = $this->createDeleteForm($detailsMission);

        return $this->render('detailsmission/show.html.twig', array(
            'detailsMission' => $detailsMission,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detailsMission entity.
     *
     */
    public function editAction(Request $request, DetailsMission $detailsMission)
    {
        $deleteForm = $this->createDeleteForm($detailsMission);
        $editForm = $this->createForm('AppBundle\Form\DetailsMissionType', $detailsMission);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detailsmission_edit', array('id' => $detailsMission->getId()));
        }

        return $this->render('detailsmission/edit.html.twig', array(
            'detailsMission' => $detailsMission,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detailsMission entity.
     *
     */
    public function deleteAction(Request $request, DetailsMission $detailsMission)
    {
        $form = $this->createDeleteForm($detailsMission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detailsMission);
            $em->flush($detailsMission);
        }

        return $this->redirectToRoute('detailsmission_index');
    }

    /**
     * Creates a form to delete a detailsMission entity.
     *
     * @param DetailsMission $detailsMission The detailsMission entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetailsMission $detailsMission)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detailsmission_delete', array('id' => $detailsMission->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
