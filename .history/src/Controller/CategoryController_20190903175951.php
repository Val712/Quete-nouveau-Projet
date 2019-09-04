<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

       $addcat->handleRequest($request);
       if ($addcat->isSubmitted()) {

       }


      return $this->render('addCategory.html.twig');
  }


}