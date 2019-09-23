<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends fixture 
{

    public function load(ObjectManager $manager)
    {

        $article = new Article();
        $article->setTitle('Framework PHP : Symfony 4');
        $article->setContent('Symfony 4, un framework sympa à connaître !');
        
        
        $manager->persist($article);
        $manager->flush();
        }
}


