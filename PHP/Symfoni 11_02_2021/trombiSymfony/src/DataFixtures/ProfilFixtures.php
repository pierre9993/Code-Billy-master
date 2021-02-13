<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Profil;
//use Profils;

class ProfilFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i =1; $i<10 ; $i++){
            $profil= new Profil();
            $profil->setNom("Nom n°$i")
                   ->setPrenom("Prénom n°$i")
                   ->setImage("https://picsum.photos/200/20$i")
                   ->setCreatedAt(new \DateTime());
            
            $manager->persist($profil);

        }

        $manager->flush();
    }
}
