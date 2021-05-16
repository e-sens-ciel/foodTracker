<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Food;

class FoodFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new Food();
        $product->setName("Escalope de poulet")
        ->setProteins("24")
            ->setLipids("1.8")
            ->setGlucides("0")
            ->setEnergies("111");
        $manager->persist($product);

        $product2 = new Food();
        $product2->setName("Riz")
        ->setProteins("24")
        ->setLipids("1.8")
        ->setGlucides("0")
        ->setEnergies("111");
        $manager->persist($product2);

        $manager->flush();
    }
}
