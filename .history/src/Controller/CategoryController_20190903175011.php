<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
   /**
    * @Route("/Category/", name="addCategory")
   */
  public function index()
  {
    $category = new Category();
    $addcat = $this->createForm(
      CategoryType::class, 
      $category,
      ['method'=> Request::METHOD_POST]
       );

       $form->handleRequest($request);
       if ($form->isSubmitted()) {

       }


      return $this->render('addCategory.html.twig');
  }


}