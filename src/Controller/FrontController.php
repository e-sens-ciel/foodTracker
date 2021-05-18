<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Food;

class FrontController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Food::class);
        $products = $repo->findAll();

        return $this->render('front/index.html.twig', 
    [
        'controller_name' => "FrontController",
        'products' => $products
    ]);
    }
    #[Route('/bmicalculator', name: 'bmicalculator')]
    public function bmicalculator(): Response
    {
        return $this->render('front/bmicalculator.html.twig');
    }
    #[Route('/gallery', name: 'gallery')]
    public function gallery(): Response
    {
        return $this->render('front/gallery.html.twig');
    }
    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('front/contact.html.twig');
    }
    #[Route('/classes', name: 'classes')]
    public function classes(): Response
    {
        return $this->render('front/classes.html.twig');
    }
    #[Route('/blog', name: 'blog')]
    public function blog(): Response
    {
        return $this->render('front/blog.html.twig');
    }
    #[Route('/blogdetails', name: 'blogdetails')]
    public function blogdetails(): Response
    {
        return $this->render('front/blogdetails.html.twig');
    }

    #[Route('/aboutus', name: 'aboutus')]
    public function aboutus(): Response
    {
        return $this->render('front/aboutus.html.twig');
    }


}
