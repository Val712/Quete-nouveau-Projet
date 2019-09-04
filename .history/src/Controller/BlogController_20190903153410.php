<?php
// src/Controller/BlogController.php
namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Form\ArticleSearchType;
use App\Form\CategoryType;
Use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




 /**
    * @Route("/blog", name="blog_")
   */

class BlogController extends AbstractController
{
  /**
 * Show all row from article's entity
 *
 * @Route("/index", name="index")
 * @return Response A response instance
 */
 public function index(): Response    //Déclaration de l'Array $article contenant tous l'objet article
 {
      $articles = $this->getDoctrine()
          ->getRepository(Article::class)
          ->findAll();

      if (!$articles) {              // Création d'un message lorsque la variable $article ne contient rien
          throw $this->createNotFoundException(
          'No article found in article\'s table.'
          );
      }

      $form = $this->createForm(
        ArticleSearchType::class,
        null,
        ['method' => Request::METHOD_GET]

        );

        $category = new Category();
        $form2 = $this->createForm(
          CategoryType::class, 
          $category,
          ['method'=> Request::METHOD_POST]
        );


      return $this->render(             // affichage dans la vue de l'array $article
              'blog/index.html.twig',
              ['articles' => $articles,
              'form' => $form->createView(),
              'form2'=> $form2->createView()]
      );
 }
 /**
 * Getting a article with a formatted slug for title
 *
 * @param string $slug The slugger
 *
 * @Route("/show/{slug<^[a-z0-9-]+$>}",
 *     defaults={"slug" = null},
 *     name="show")
 *  @return Response A response instance
 */
public function show(?string $slug) : Response
{
    if (!$slug) {     // création d'un message d'erreur lorsque $slug ne contient rien
           throw $this
           ->createNotFoundException('No slug has been sent to find an article in article\'s table.');
       }

    $slug = preg_replace(    //remplace les tirets par des espaces dans le slug
     '/-/',
     ' ', ucwords(trim(strip_tags($slug)), "-")
       );

    $article = $this->getDoctrine()
           ->getRepository(Article::class)
           ->findOneBy(['Title' => mb_strtolower($slug)]); //trouve dans la class article un title correspondant au slug

    if (!$article) {   // création d'un message d'erreur lorsque $article ne contient rien : $slug ne correspond a aucun titre d'article
         throw $this->createNotFoundException(
         'No article with '.$slug.' title, found in article\'s table.'
     );
   }

    return $this->render(  // affichage dans la vue la variable $slug et la variable $article
    'blog/show.html.twig',
     [
             'article' => $article,
             'slug' => $slug,
     ]
   );
}


 /**
 * Show by category from article's entity
 *
 * @Route("/showByCategory/{name}", name="showCategory")
 * @return Response A response instance
 */
 public function showByCategory(category $category) // 
 {

    //$category = $this->getDoctrine() // Appel de la class/table Catégory 
       // ->getRepository(Category::class)
       // ->findOneBy(['name' => mb_strtolower($categoryName)]); //met dans la variable $category le nom de la category appellé le slug
        
        $articles = $category->getArticles(); //retourne dans $category la liste de tous les article de la category taper dans l'url
    
    return $this->render(
        'blog/category.html.twig',
        [
            'category' => $category,
            'articles' => $articles,
           
            
        ]
    );
 }
    
}
