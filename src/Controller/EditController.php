<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User ; 
use App\Entity\Article ; 
use App\Form\RegistrationFormType;
use App\Form\ArticlFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class EditController extends AbstractController
{
    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function editUser(Request $request,EntityManagerInterface $em,UserPasswordEncoderInterface $passwordEncoder): Response
    {
    $user = new User();
    //$user = $this->getDoctrine()->getRepository(User::class)->find(1);
 
    $form = $this->createForm(RegistrationFormType::class, $user);
    $form->handleRequest($request);


     if ($form->isSubmitted() && $form->isValid()) {
     $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            /** @var User $user */
            $user = $form->getData();
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'User Updated! Inaccuracies squashed!');
          //  return $this->redirectToRoute('admin_article_list');
        }



        return $this->render('edit/index.html.twig', [
            'editForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/alluser", name="alluser")
     */
    public function listUser(){
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('edit/all.html.twig', [
            "users" => $users,
        ]);
}

/**
     * @Route("oneuser/{id}", name="onUser")
     */
   public function Onuser($id){

        $user = $this->getDoctrine()->getRepository(User::class)->find($id);
         return $this->render("edit/oneuser.html.twig", [
        "user" => $user,
    ]);
 }

 /**
 * @Route("/modify-user/{id}", name="modify_user")
     */
 public function modifUser(Request $request, int $id): Response{

       $entityManager = $this->getDoctrine()->getManager();
       $user = $entityManager->getRepository(User::class)->find($id);
       $form = $this->createForm(RegistrationFormType::class, $user);
       $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
    {
        $entityManager->flush();
    }
      return $this->render("edit/index.html.twig", [
        "form_title" => "Modifier mes informations",
        "form_user" => $form->createView(),
    ]);




}

/**
     * @Route("/allproduct", name="allproduct")
     */
public function allProduct(){
        $products = $this->getDoctrine()->getRepository(Article::class)->findAll();

        return $this->render('index_extends/allarticl.html.twig', [
            "products" => $products,
            "title"=>"Liste de produit"
        ]);
}
 /**
 * @Route("/modify-product/{id}", name="modify_product")
     */
public function editProduct(Request $request, int $id):Response{

 $entityManager = $this->getDoctrine()->getManager();
       $article = $entityManager->getRepository(Article::class)->find($id);
       $form = $this->createForm(ArticlFormType::class, $article);
       $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
    {
        $entityManager->flush();
    }
      return $this->render("edit/editProduct.html.twig", [
        "form_title" => "Modifier mes informations",
        "form_product" => $form->createView(),
    ]);


}


 /**
 * @Route("/delete-product/{id}", name="delete_product")
     */
public function deleteProduct(int $id):Response{

 $entityManager = $this->getDoctrine()->getManager();
    $article = $entityManager->getRepository(Article::class)->find($id);
    $entityManager->remove($article);
    $entityManager->flush();

    return $this->redirectToRoute("allproduct");
}
}
