<?php

namespace WarsztatyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


use WarsztatyBundle\Entity\User;

class UserController extends Controller
{


  private function getUserForm($user,$actionUrl = false,$button_label = 'Create User')
    {
    if($actionUrl === false)
    {
        $actionUrl = $this->generateUrl('warsztaty_user_new');
    }
    $form = $this->createFormBuilder($user)
        ->setAction($actionUrl)
        ->setMethod('POST')
        ->add('name')
        ->add('surname')
        ->add('info')
        ->add('save','submit',array('label' => $button_label))
        ->getForm();
    return $form;
}

    /**
     * @Route("/new")
     * @Template()
     */
    public function newAction(Request $req)
    {
        $user = new User();
        $form = $this->getUserForm($user);
        $form->handleRequest($req);
        if($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

        }
        return ['form' => $form->createView()];

    }

    /**
     * @Route("/{id}/modify")
     * @Template()
     */
    public function modifyAction(Request $req,$id)
    {
      $repo = $this->getDoctrine()
            ->getRepository("WarsztatyBundle:User");
        $user = $repo->find($id);
        $form = $this->getUserForm(
            $user,
            $this->generateUrl(
                'warsztaty_user_modify',
                array('id'=>$id)
            ),
            'Zaktualizuj'
        );
        $form->handleRequest($req);
        if($form->isSubmitted()){
            $this->getDoctrine()->getManager()->flush();
        }
        return ['form'=>$form->createView()];

    }

    /**
     * @Route("/{id}/delete")
     * @Template()
     */
    public function deleteAction($id)
    {
      $em = $this->getDoctrine()->getManager();
            $repository = $this->getDoctrine()->getRepository('WarsztatyBundle:User');

            $query = $em->createQuery(
              'DELETE FROM WarsztatyBundle:User p WHERE p.id = '.$id.'')->execute();

            return new Response('Usunięto wpis o id: '.$id);
    }

    /**
     * @Route("/{id}")
     * @Template()
     */

    //  public function showOneAction($id)
    //  {
    //   // $em = $this->getDoctrine()->getManager();
    //   $repository = $this->getDoctrine()->getRepository('WarsztatyBundle:User');
    //   $oneId = $repository->findOneById($id);
     //
     //
     //
    //   $resp = new Response ('Chciałeś imie : '.$oneId->getName().',</br> nazwisko '.$oneId->getSurname().',</br> info '.$oneId->getInfo());
    //   return $resp;
    //  }

     /**
      * @Route("/showAll")
      * @Template()
      */
      public function showAllAction()
      {
      $em = $this->getDoctrine()->getManager();
      $repository = $this->getDoctrine()->getRepository('WarsztatyBundle:User');
      $allId = $repository->findAll();

        return new Response ($allId);
      }
}
