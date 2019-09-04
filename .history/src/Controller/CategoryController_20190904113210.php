<?php

namespace App\Controller;

use App\Entity\Category;
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
       if ($addcat->isSubmitted()) {
        $data = $addcat->getData();
       }


      return $this->render('blog/addCategory.html.twig',['addcat' => $addcat->createView()]);
  }


}