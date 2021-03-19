<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * First Migration
 */
final class VersionFirst extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'The first instance of this book store database';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE book (
                id INT AUTO_INCREMENT NOT NULL,
                name VARCHAR(255) NOT NULL,
                release_date DATE NOT NULL,
                length INT NOT NULL,
                readable_by_user TINYINT(1) NOT NULL,
                readable_by_admin TINYINT(1) NOT NULL,
                PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE books_genres (
                book_id INT NOT NULL,
                genre_id INT NOT NULL,
                INDEX IDX_6C215D1A16A2B381 (book_id),
                INDEX IDX_6C215D1A4296D31F (genre_id),
                PRIMARY KEY(book_id, genre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE genre (
                id INT AUTO_INCREMENT NOT NULL,
                name VARCHAR(255) NOT NULL,
                PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE store_users (
                id INT AUTO_INCREMENT NOT NULL,
                email VARCHAR(180) NOT NULL,
                roles JSON NOT NULL,
                password VARCHAR(255) NOT NULL,
                UNIQUE INDEX UNIQ_68BDF3F0E7927C74 (email),
                PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE books_genres 
                ADD CONSTRAINT FK_6C215D1A16A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE'
        );
        $this->addSql(
            'ALTER TABLE books_genres 
                ADD CONSTRAINT FK_6C215D1A4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE'
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE books_genres DROP FOREIGN KEY FK_6C215D1A16A2B381');
        $this->addSql('ALTER TABLE books_genres DROP FOREIGN KEY FK_6C215D1A4296D31F');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE books_genres');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE store_users');
    }
}
