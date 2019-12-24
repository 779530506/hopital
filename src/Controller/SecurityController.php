<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security", name="security")
     */
    public function index()
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
     * @Route("/security/form", name="securite_form")
     */
    public function form(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user=new User();
        $form=$this->createForm(UserType::class,$user);
        $form->handleRequest($request);
         if($form->isSubmitted() &&  $form->isValid()){
             $hash=$encoder->encodePassword($user, $user->getPassword());
             $user->setPassword($hash);
             $em=$this->getDoctrine()->getManager();
             $em->persist($user);
             $em->flush();
             return $this->redirectToRoute("securite_connexion");
         }
         
        return $this->render('security/form.html.twig', [
            'controller_name' => 'SecurityController',
            'form'=>$form->createView(),
        ]);
    }
/**
 * @Route("/securite/connexion", name="securite_connexion")
 */
    public function connexion(){

        return $this->render('security/connexion.html.twig');

}
/**
 * @Route("/securite/logout", name="securite_logout")
 */
 public function logout(){}
}