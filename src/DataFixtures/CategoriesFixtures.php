<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

;

class CategoriesFictures extends Fixture
{

    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $parent = new Categories();
        $parent -> setName('Informatique');
        $parent -> setSlug('informatique');
        $manager->persist($parent);

        $category = new Categories();
        $category -> setName('Ordinateurs');
        $category -> setSlug('ordinateurs');
        $category -> setParent($parent);
        $manager->persist($category);

        $manager->flush();
    }
}
