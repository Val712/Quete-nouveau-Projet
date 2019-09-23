<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\fixture;
use Doctrine\Common\Persistence\ObjectManager;

const categorie = ['PHP', 'JavaScript', 'Java', 'ruby', 'devops'];

class CategoryFixtures extends fixture {
    
    public function load(ObjectManager $manager){

        foreach (self::categories as $key => $categoryName){

        $category = new Category();
        $category->setName($categoryName);
        $manager->persist($category);
        
        }
        $manager->flush();
    }


}