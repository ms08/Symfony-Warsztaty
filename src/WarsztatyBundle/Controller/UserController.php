<?php

namespace WarsztatyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


use WarsztatyBundle\Entity\User;
use WarsztatyBundle\Entity\Address;

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

  private function getAdresForm($adres,$actionUrl = false,$button_label = 'Dodaj adres')
    {
    // if($actionUrl === false)
    // {
    //     $actionUrl = $this->generateUrl('warsztaty_user_new');
    // }
    $form = $this->createFormBuilder($adres)
        ->setAction($actionUrl)
        ->setMethod('POST')
        ->add('miasto')
        ->add('ulica')
        ->add('numer_domu')
        ->add('numer_mieszkania')
        ->add('user',EntityType::class,['class'=>'WarsztatyBundle\Entity\User',
                      'choice_label'=>'name'])
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
     * @Route("/showAll")
     * @Template()
     */
     public function showAllAction()
     {
     $em = $this->getDoctrine()->getManager();
     $repository = $this->getDoctrine()->getRepository('WarsztatyBundle:User');
     $allId = $repository->findAll();

     return ['all'=>$allId];

     }


    /**
     * @Route("/show/{id}")
     * @Template()
     */

     public function showOneAction($id)
     {
      // $em = $this->getDoctrine()->getManager();
      $repository = $this->getDoctrine()->getRepository('WarsztatyBundle:User');
      $oneId = $repository->findOneById($id);



      $resp = new Response ('Chciałeś imie : '.$oneId->getName().',</br> nazwisko '.$oneId->getSurname().',</br> info '.$oneId->getInfo());
      return $resp;
     }

     /**
      * @Route("/addAddress")
      * @Template()
      */

      public function addAdressAction(Request $req)
      {
       // $em = $this->getDoctrine()->getManager();
       $adres = new Address();
       $form = $this->getAdresForm($adres);
       $form->handleRequest($req);
       if($form->isSubmitted())
       {
           $em = $this->getDoctrine()->getManager();
           $em->persist($adres);
           $em->flush();

       }
       return ['form' => $form->createView()];

      }


}
