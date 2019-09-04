<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
   /**
    * @Route("/", name="app_index")
   */
  public function index()
  {
      return $this->render('addCategory.html.twig');
  }


}