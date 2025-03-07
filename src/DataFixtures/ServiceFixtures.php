<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR"); // ✅ Déplacer en dehors de la boucle

        for ($i = 0; $i < 15; $i++) {
            $service = new Service();
            $service->setNom($faker->word()); // ✅ Utiliser `word()` correctement
            $service->setDescription($faker->realText(100));
            $service->setDtCreation($faker->dateTimeThisYear());

            $manager->persist($service);

            // 📌 Stocker la référence APRÈS persist()
            $this->addReference("service_$i", $service);
        }

        $manager->flush();
    }
}
