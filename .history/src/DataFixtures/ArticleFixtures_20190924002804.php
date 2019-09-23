<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ArticleFixtures extends Fixture implements DependentFixtureInterface

 {

    public function load(ObjectManager $manager)
    {

        
        // on créé 50 articless
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 50; $i++) {
            $article = new Article();
            $article->setTitle(mb_strtolower($faker->catchPhrase));
            $article->setContent($faker->text);
            $article->setCategory($this->getReference('categorie_'));
            $manager->persist($article);
           
            

        }
       
        
        $manager->flush();
        
    }


    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }

}



