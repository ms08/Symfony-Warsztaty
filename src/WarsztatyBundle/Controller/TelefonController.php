<?php

namespace WarsztatyBundle\Controller;

use WarsztatyBundle\Entity\Telefon;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Telefon controller.
 *
 * @Route("telefon")
 */
class TelefonController extends Controller
{
    /**
     * Lists all telefon entities.
     *
     * @Route("/", name="telefon_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $telefons = $em->getRepository('WarsztatyBundle:Telefon')->findAll();

        return $this->render('telefon/index.html.twig', array(
            'telefons' => $telefons,
        ));
    }

    /**
     * Creates a new telefon entity.
     *
     * @Route("/new", name="telefon_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $telefon = new Telefon();
        $form = $this->createForm('WarsztatyBundle\Form\TelefonType', $telefon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($telefon);
            $em->flush();

            return $this->redirectToRoute('telefon_show', array('id' => $telefon->getId()));
        }

        return $this->render('telefon/new.html.twig', array(
            'telefon' => $telefon,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a telefon entity.
     *
     * @Route("/{id}", name="telefon_show")
     * @Method("GET")
     */
    public function showAction(Telefon $telefon)
    {
        $deleteForm = $this->createDeleteForm($telefon);

        return $this->render('telefon/show.html.twig', array(
            'telefon' => $telefon,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing telefon entity.
     *
     * @Route("/{id}/edit", name="telefon_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Telefon $telefon)
    {
        $deleteForm = $this->createDeleteForm($telefon);
        $editForm = $this->createForm('WarsztatyBundle\Form\TelefonType', $telefon);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('telefon_edit', array('id' => $telefon->getId()));
        }

        return $this->render('telefon/edit.html.twig', array(
            'telefon' => $telefon,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a telefon entity.
     *
     * @Route("/{id}", name="telefon_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Telefon $telefon)
    {
        $form = $this->createDeleteForm($telefon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($telefon);
            $em->flush();
        }

        return $this->redirectToRoute('telefon_index');
    }

    /**
     * Creates a form to delete a telefon entity.
     *
     * @param Telefon $telefon The telefon entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Telefon $telefon)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('telefon_delete', array('id' => $telefon->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
