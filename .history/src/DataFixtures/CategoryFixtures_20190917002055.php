<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\fixture;
use Doctrine\Common\Persistence\ObjectManager;



class CategoryFixtures extends fixture {

const categorie = ['PHP', 'JavaScript', 'Java', 'ruby', 'devops'];
    
    public function load(ObjectManager $manager){

        foreach (self::categorie as $key => $categoryName){

        $category = new Category();
        $category->setName($categoryName);
        $manager->persist($category);
        
        }
        $manager->flush();
    }


}