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
        $movie->setImagePath('https://cdn.pixabay.com/photo/2019/06/25/12/35/templar-4298112_1280.jpg');

        //Add data to Pivot Table
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('One Punch Man');
        $movie2->setReleaseYear(2017);
        $movie2->setDescription("This is the description of the One Punch Man");
        $movie2->setImagePath('https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/One_Punch_Man_logo.svg/1920px-One_Punch_Man_logo.svg.png');
        //Add data to Pivot Table
        $movie->addActor($this->getReference('actor_3'));
        $movie->addActor($this->getReference('actor_4'));
        
        $manager->persist($movie2);

        $manager->flush();
    }
}
