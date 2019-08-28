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
 * Show all row from article's entity
 *
 * @Route("/", name="index")
 * @return Response A response instance
 */
 public function index(): Response
 {
      $articles = $this->getDoctrine()
          ->getRepository(Article::class)
          ->findAll();

      if (!$articles) {
          throw $this->createNotFoundException(
          'No article found in article\'s table.'
          );
      }

      return $this->render(
              'blog/index.html.twig',
              ['articles' => $articles]
      );
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
