<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cargaison;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cargaison controller.
 *
 */
class CargaisonController extends Controller
{
    /**
     * Lists all cargaison entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cargaisons = $em->getRepository('AppBundle:Cargaison')->findAll();

        return $this->render('cargaison/index.html.twig', array(
            'cargaisons' => $cargaisons,
        ));
    }

    /**
     * Creates a new cargaison entity.
     *
     */
    public function newAction(Request $request)
    {
        $cargaison = new Cargaison();
        $form = $this->createForm('AppBundle\Form\CargaisonType', $cargaison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cargaison);
            $em->flush($cargaison);

            return $this->redirectToRoute('cargaison_show', array('id' => $cargaison->getId()));
        }

        return $this->render('cargaison/new.html.twig', array(
            'cargaison' => $cargaison,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cargaison entity.
     *
     */
    public function showAction(Cargaison $cargaison)
    {
        $deleteForm = $this->createDeleteForm($cargaison);

        return $this->render('cargaison/show.html.twig', array(
            'cargaison' => $cargaison,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cargaison entity.
     *
     */
    public function editAction(Request $request, Cargaison $cargaison)
    {
        $deleteForm = $this->createDeleteForm($cargaison);
        $editForm = $this->createForm('AppBundle\Form\CargaisonType', $cargaison);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cargaison_edit', array('id' => $cargaison->getId()));
        }

        return $this->render('cargaison/edit.html.twig', array(
            'cargaison' => $cargaison,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cargaison entity.
     *
     */
    public function deleteAction(Request $request, Cargaison $cargaison)
    {
        $form = $this->createDeleteForm($cargaison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cargaison);
            $em->flush($cargaison);
        }

        return $this->redirectToRoute('cargaison_index');
    }

    /**
     * Creates a form to delete a cargaison entity.
     *
     * @param Cargaison $cargaison The cargaison entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cargaison $cargaison)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cargaison_delete', array('id' => $cargaison->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
