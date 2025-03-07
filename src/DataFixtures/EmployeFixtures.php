<?php

namespace App\DataFixtures;

use App\Entity\Employe;
use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EmployeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 15 ; $i++){
            $faker = Factory::create("fr_FR");
            $employee = new Employe();
            $employee->setNom($faker->lastName());
            $employee->setPrenom($faker->firstName());
            $employee->setTelephone($faker->numerify('##########'));
            $employee->setEmail($faker->email());
            $employee->setAdresse($faker->address());
            $employee->setPoste($faker->jobTitle());
            $employee->setSalaire($faker->numberBetween(30000, 100000));
            $employee->setDtnaissance($faker->dateTimeBetween('-50 years', '-20 years'));
            $employee->setIsactive($faker->boolean);

            $manager->persist($employee);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ServiceFixtures::class,
        ];
    }

}
