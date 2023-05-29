<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Dark Knight');
        $movie->setReleaseYear(2009);
        $movie->setDescription("This is the description of the Dark Knight");
        $movie->setImagePath('https://cdn.pixabay.com/photo/2016/11/18/17/02/cave-1835823_1280.jpg');
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));
        $movie->addActor($this->getReference('actor_3'));
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('One Punch Man');
        $movie2->setReleaseYear(2017);
        $movie2->setDescription("This is the description of the One Punch Man");
        $movie2->setImagePath('https://static.wikia.nocookie.net/onepunchman/images/8/82/Saitama_Manga.png/revision/latest?cb=20220825051134');
        $manager->persist($movie2);

        $manager->flush();
    }
}
