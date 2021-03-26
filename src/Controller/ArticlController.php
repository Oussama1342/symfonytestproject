<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ArticlFormType ;
use App\Form\CategoryType ;
use App\Entity\Category;


class ArticlController extends AbstractController
{
    /**
     * @Route("/articl", name="articl")
     */
    public function addArticle(Request $request): Response
    {
    
     $article = new Article();
     $form = $this->createForm(ArticlFormType::class, $article);
       $form->handleRequest($request);
      
        if ($form->isSubmitted() && $form->isValid() ) {
          

            $entityManager = $this->getDoctrine()->getManager();
  
            $entityManager->persist($article);
            $entityManager->flush();
            // do anything else you need here, like send an email
        }



        return $this->render('index_extends/addarticl.html.twig', [
            'articlForm' => $form->createView(),
        

        ]);
    }
    /**
 * @Route("/search-art/{category}", name="search_art")
     */
    public function searchArticl(Request $request, string $category):Response{
     $entityManager = $this->getDoctrine()->getManager();
     $query = $entityManager->createQuery('SELECT art.category FROM App\Entity\Article art ');
     $cats =  $query->getResult();

     $articles  = $entityManager->getRepository(Article::class)->findByCategory($category);
     $arts = $entityManager->getRepository(Article::class)->findAll();
      return $this->render("edit/search.html.twig", [
        "articles" => $articles,
        "arts" => $arts,
        "tabquery"=> $query
    ]);

    }
}
