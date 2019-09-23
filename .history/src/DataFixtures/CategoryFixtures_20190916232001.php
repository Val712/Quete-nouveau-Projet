<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends fixture {
    
    public function load(ObjectManager $manager){
        $category = new Category();
        $category->setName('name' : 'Nom de catégorie');
        $manager->persist($category);
        $manager->flush();
    }


}