<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Contact extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $lists = [
            ["Nom1", "firstName1", true],
            ["Nom2", "firstName2", true],
            ["Nom3", "firstName3", true],
            ["Nom4", "firstName4", false],
            ["Nom5", "firstName5", false],
            ["Nom6", "firstName6", true]
        ];

        foreach ($lists as $list) {
            $article = new \App\Entity\Contact();
            $article->setName($list[0]);
            $article->setFirstname($list[1]);
            $article->setNewsletter($list[2]);
            $manager->persist($article);
        }

        $manager->flush();
    }
}
