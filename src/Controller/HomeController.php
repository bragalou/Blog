<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\AjouterArticleType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(AjouterArticleType::class, $article);
        //$form->add('Enregistrer','submit');
        $form->handleRequest($request);

        dump($form->getViewData());

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();
            $article = $form->getData();

            //return header('Location: http://127.0.0.1:8000/blog');
            // return new Response('envoyer');
            // dump("en base !");
            return $this->redirectToRoute('blog');

        }

        return $this->renderForm('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form,
        ]);
    }

    
}

