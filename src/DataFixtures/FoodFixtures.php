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
        $product->setName("Shaker")
            ->setGrams(25)
            ->setProteins("22");
            // ->setLipids("1.8")
            // ->setGlucides("0")
            // ->setEnergies("111");
        $manager->persist($product);

        $product2 = new Food();
        $product2->setName("Escalope de poulet")
        ->setProteins("24")
        ->setLipids("1.8")
        ->setGlucides("0")
        ->setEnergies("111");
        $manager->persist($product2);

        $product3 = new Food();
        $product3->setName("Poulet bouilli(sans peau)")
        ->setGrams("100")
        ->setProteins("27")
        ->setLipids("0")
        ->setGlucides("6.71")
        ->setEnergies("177");
        $manager->persist($product3);

        $product4  = new Food();
        $product4->setName("Steak haché")
        ->setGrams("100")
        ->setProteins("24")
        ->setLipids("0")
        ->setGlucides("20")
        ->setEnergies("289");
        $manager->persist($product4);

        $product5  = new Food();
        $product5->setName("Thon")
        ->setGrams("100")
        ->setProteins("25")
        ->setLipids("0")
        ->setGlucides("0.82");
        $manager->persist($product5);

        $product6  = new Food();
        $product6->setName("Oeuf blanc")
        ->setGrams("100")
        ->setProteins("11")
        ->setLipids("0.1")
        ->setGlucides("0.3")
        ->setEnergies("44");
        $manager->persist($product6);

        $product7  = new Food();
        $product7->setName("Oeuf au plat")
        ->setGrams("100")
        ->setProteins("12.871")
        ->setLipids("1.106")
        ->setGlucides("14")
        ->setEnergies("193");
        $manager->persist($product7);



        $product8  = new Food();
        $product8->setName("Fromage blanc 0%")
        ->setGrams("100")
        ->setProteins("7");
        $manager->persist($product8);

        $product9  = new Food();
        $product9->setName("Lentilles cuites")
        ->setGrams("100")
        ->setProteins("9")
        ->setLipids("20.13")
        ->setGlucides("0.8")
        ->setEnergies("116");
        $manager->persist($product9);

        $product10  = new Food();
        $product10->setName("Poisson blanc")
        ->setGrams("100");
        $manager->persist($product10);

        $product11  = new Food();
        $product11->setName("Patates douces bouillies")
        ->setGrams("100")
        ->setProteins("1.37")
        ->setLipids("17.72")
        ->setGlucides("0.14")
        ->setEnergies("100");
        $manager->persist($product11);

        $product12  = new Food();
        $product12->setName("Pâtes")
        ->setGrams("100")
        ->setProteins("4.37")
        ->setLipids("25.12")
        ->setGlucides("0.98")
        ->setEnergies("124");
        $manager->persist($product12);

        $product9  = new Food();
        $product9->setName("Riz blanc")
        ->setGrams("100");
        $manager->persist($product9);

        $product9  = new Food();
        $product9->setName("Pommes de terre")
        ->setGrams("100")
        ->setProteins("1")
        ->setLipids("19")
        ->setGlucides("0")
        ->setEnergies("86");
        $manager->persist($product9);

        $product10  = new Food();
        $product10->setName("Pain complet")
        ->setGrams("100")
        ->setProteins("8.4")
        ->setLipids("49.4")
        ->setGlucides("1.3")
        ->setEnergies("250");
        $manager->persist($product10);

        $manager->flush();
    }
}
