<?php
// src/Controller/BlogController.php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


 /**
    * @Route("/blog", name="blog_")
   */

class BlogController extends AbstractController
{
   /**
    * @Route("/index", name="index")
   */
  public function index()
  {
      return $this->render('blog/index.html.twig', [
              'owner' => 'Thomas',
      ]);
  }

  /**
    * @Route("/show/{slug}", 
    * requirements={"slug"="[a-z0-9\-]+"},
    * defaults={"slug": "Article sans titre"})
   */

  public function show($slug)
  {
    $slug = ucwords(str_replace('-',' ',$slug));
      return $this->render('blog/show.html.twig', ['slug' => $slug]);
  }
}
