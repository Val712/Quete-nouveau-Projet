<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



 /**
    * @Route("/category", name="category_")
   */


class CategoryController extends AbstractController
{
   /**
    * @Route("/add", name="add")
   */
  public function add(Request $request)
  {
    $category = new Category();
    $addcat = $this->createForm(
      CategoryType::class, 
      $category,
      ['method'=> Request::METHOD_POST]
       );

       $addcat->handleRequest($request);
       if ($addcat->isSubmitted() && $addcat->isVakid()) {
        $data = $addcat->getData();
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($data);
        $entityManager->flush();


       }


      return $this->render('blog/addCategory.html.twig',['addcat' => $addcat->createView()]);
  }


}