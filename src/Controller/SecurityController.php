<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;


use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
   
    #[Route('/registration', name: 'registration')]
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $manager = $this->getDoctrine()->getManager();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('security_login');
        }
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/login', name: 'security_login')]
    public function login()
    {
        if(($this->getUser() == null))
        {
            return $this->render('security/login.html.twig');
            
        }
        else return $this->redirectToRoute('index');
    }

    #[Route('/validlogin', name: 'valid_login')]
    public function validlogin()
    {
        return $this->redirectToRoute('index');
    }

    #[Route('/logout', name: 'security_logout')]
    public function logout() {
    }

}
