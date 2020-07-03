<?php

namespace App\DataFixtures;

use App\Entity\Marque;
use App\Entity\Modele;
use App\Entity\Voiture;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       $marque1 = new Marque();
       $marque1->setLibelle("BMW");
       $manager->persist($marque1);

       $marque2 = new Marque();
       $marque2->setLibelle("citroen_c3");
       $manager->persist($marque2);

       $marque3 = new Marque();
       $marque3->setLibelle("mercedes_CLA");
       $manager->persist($marque3);

       $marque4 = new Marque();
       $marque4->setLibelle("nissan_17");
       $manager->persist($marque4);

       $marque5 = new Marque();
       $marque5->setLibelle("peugeot_3008");
       $manager->persist($marque5);

       $marque6 = new Marque();
       $marque6->setLibelle("renault_20");
       $manager->persist($marque6);

       $modele1 = new Modele();
       $modele1->setLibelle("BMW Serie5")
              ->setImage("BMW.jpg")
              ->setPrix("20000")
              ->setMarque($marque1);
       $manager->persist($modele1);

       $modele2 = new Modele();
       $modele2->setLibelle("Citroen c5 Aircross")
              ->setImage("citroen_c3.jpg")
              ->setPrix("50000")
              ->setMarque($marque2);
       $manager->persist($modele2);

       $modele3 = new Modele();
       $modele3->setLibelle("Mercedes Classe A Berling")
              ->setImage("mercedes_CLA.jpg")
              ->setPrix("100000")
              ->setMarque($marque3);
       $manager->persist($modele3);

       $modele4 = new Modele();
       $modele4->setLibelle("Nissan Micra")
              ->setImage("nissan_17.png")
              ->setPrix("60000")
              ->setMarque($marque4);
       $manager->persist($modele4);

       $modele5 = new Modele();
       $modele5->setLibelle("Peugeot 3008")
              ->setImage("peugeot_3008.png")
              ->setPrix("10000")
              ->setMarque($marque5);
       $manager->persist($modele5);

       $modele6 = new Modele();
       $modele6->setLibelle("Renault Capture")
              ->setImage("renault_20.png")
              ->setPrix("25000")
              ->setMarque($marque6);
       $manager->persist($modele6);

       $modeles = [$modele1, $modele2, $modele3, $modele4, $modele5, $modele6];

       $faker = \Faker\Factory::create('fr_FR');

       foreach($modeles as $m)
       {
           $rand = rand(3,5);
           for($i=0; $i <= $rand; $i++)
           {
               $voiture = new Voiture();
               $voiture->setImmatriculation($faker->regexify("[A-Z]{2}[0-9]{3,4}[A-Z]{2}"))
                       ->setNbPortes($faker->randomElement($array = array(3,5)))
                       ->setAnnee($faker->numberBetween($min=1990,$max=2020))
                       ->setModele($m);
                       $manager->persist($voiture);
           }
       }



        $manager->flush();
    }
}
