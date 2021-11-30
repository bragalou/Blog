<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Article extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $lists = [
            ["Nom1", "slug1", "yoyoyoyo"],
            ["Nom2", "slug2", "fafafafa"],
            ["Nom3", "slug3", "aaaaaaaa"],
            ["Nom4", "slug4", "bbbbbbbb"],
            ["Nom5", "slug5", "cccccccc"],
            ["Nom6", "slug6", "dddddddd"]
        ];

        foreach ($lists as $list) {
            $article = new \App\Entity\Article();
            $article->setName($list[0]);
            $article->setSlug($list[1]);
            $article->setContent($list[2]);
            $manager->persist($article);
        }

        $manager->flush();
    }
}
