<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('contact/contact.html.twig', [
            'controller_name' => 'simple contact',
        ]);  
    }


    /**
     * @Route("/contact/{city}", name="contactVille")
     */
    public function contactVille(Request $request, string $city = ""): Response
    {
        $name = $request->query->get('name');

        return $this->render('contact/contactVille.html.twig', [

            'controller_name' => 'contact',
            'city' => $city,
            'name' => $name
        ]);  
    }
}
