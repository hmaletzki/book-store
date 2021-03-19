<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Entity\Genre;
use App\Entity\Security\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookStoreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Genres
        $policeGenre = $this->createGenre('Police');
        $comedyGenre = $this->createGenre('Comedy');
        $dramaGenre = $this->createGenre('Drama');
        $nonFictionGenre = $this->createGenre('Non-Fiction');
        $horrorGenre = $this->createGenre('Horror');
        $tragedyGenre = $this->createGenre('Tragedy');
        $childrenGenre = $this->createGenre('Children');
        $fictionGenre = $this->createGenre('Fiction');
        $satireGenre = $this->createGenre('Satire');

        // Book 1
        $book1 = $this->createBook('Doctor With Big Eyes', 200, '01.02.2016');
        $book1->addGenre($policeGenre);
        $manager->persist($book1);

        // Book 2
        $book2 = $this->createBook('Hunger Of My Town', 10, '02.05.2016');
        $book2->addGenre($comedyGenre);
        $manager->persist($book2);

        // Book 3
        $book3 = $this->createBook('Colleagues And Demons', 30, '06.04.2015');
        $book3->addGenre($dramaGenre);
        $manager->persist($book3);

        // Book 4
        $book4 = $this->createBook('Humans In The Library', 600, '06.04.2015');
        $book4->addGenre($nonFictionGenre);
        $book4->addGenre($horrorGenre);
        $manager->persist($book4);


        // Book 5
        $book = $this->createBook('Founders Of Evil', 900, '30.08.1530');
        $book->addGenre($dramaGenre);
        $manager->persist($book);

        // Book 6
        $book = $this->createBook('Ancestor With Horns', 1000, '10.10.2019');
        $book->addGenre($dramaGenre);
        $manager->persist($book);

        // Book 7
        $book = $this->createBook('Age Of The Light', 234, '06.12.1923');
        $book->addGenre($tragedyGenre);
        $manager->persist($book);

        // Book 8
        $book = $this->createBook('Learning With The River', 200, '02.02.1965');
        $book->addGenre($childrenGenre);
        $book->addGenre($fictionGenre);
        $manager->persist($book);

        // Book 9
        $book = $this->createBook('Lord And Buffoon', 240, '09.07.2001');
        $book->addGenre($satireGenre);
        $book->addGenre($horrorGenre);
        $manager->persist($book);

        $manager->persist($policeGenre);
        $manager->persist($comedyGenre);
        $manager->persist($dramaGenre);
        $manager->persist($nonFictionGenre);
        $manager->persist($horrorGenre);
        $manager->persist($tragedyGenre);
        $manager->persist($childrenGenre);
        $manager->persist($fictionGenre);
        $manager->persist($satireGenre);

        $manager->flush();
    }

    private function createBook(string $name, int $length, string $date): Book
    {
        $book = new Book();

        return $book->setName($name)
            ->setLength($length)
            ->setReleaseDate(new DateTime($date))
            ->setReadableByAdmin(true)
            ->setReadableByUser(true);
    }

    private function createGenre(string $name)
    {
        $genre = new Genre();

        return $genre->setName($name);
    }
}
